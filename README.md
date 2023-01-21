<p>
<a href="https://packagist.org/packages/eklausme/saaze-mobility"><img src="https://img.shields.io/packagist/v/eklausme/saaze-mobility" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/eklausme/saaze-mobility"><img src="https://img.shields.io/packagist/l/eklausme/saaze-mobility" alt="License"></a>
</p>


[_Simplified Saaze_](https://eklausmeier.goip.de/blog/2021/10-31-simplified-saaze) is the static site generator, which is used to generate this blog. So far, there are four example themes for _Simplified Saaze_.
1. [Saaze Example](https://github.com/eklausme/saaze-example): By choice, this design is very simple.
2. [Saaze J-Pilot](https://github.com/eklausme/saaze-jpilot): This design contains top-menus with sub-menus, pages in English and German, a blog, responsive elements. [Demo](https://eklausmeier.goip.de/jpilot).
3. [Saaze Koehntopp](https://github.com/eklausme/saaze-koehntopp): Based on Bootstrap CSS, modeled after [Type on Strap](https://github.com/sylhare/Type-on-Strap). [Demo](https://eklausmeier.goip.de/koehntopp).
4. [Saaze NukeKlaus](https://github.com/eklausme/saaze-nukeklaus): Based on [Twenty Sixteen](https://wordpress.org/themes/twentysixteen)/WordPress, multicolumn, hero image, light+dark mode. [Demo](https://eklausmeier.goip.de/nukeklaus).


Here is another [theme](https://github.com/eklausme/saaze-mobility), called _Mobility_, modeled after the website [open-e-mobility.io](http://open-e-mobility.io) from SAP Labs France. That website was built using [Avada Website Builder](https://avada.theme-fusion.com). Some characteristics of [open-e-mobility.io](http://open-e-mobility.io):
1. Responsive design with three, two, or only one column for index page
2. Blog with hero image for each blog post
3. Multi-lingual: English, German, and French
4. Various effects on pages: drop-shaped images, buttons for hyperlinks, lists with icons for numbering, hovering and opacity change for images
5. RSS feed
6. [Hamburger menu](https://code-boxx.com/simple-responsive-pure-css-hamburger-menu), [hoverable menu](https://www.w3schools.com/howto/howto_css_dropdown.asp)
7. [Scroll-to-top](https://www.w3schools.com/howto/howto_js_scroll_to_top.asp) button ("chevronButton")

My aim was to look roughly similar to the original website but dropping some of the effects, dropping contact-form (as e-mail is already provided), dropping [accordeon effect](https://www.w3schools.com/howto/howto_js_accordion.asp) for FAQ-page (deemed difficult to read for end user).

The source code for this theme is here: [saaze-mobility](https://github.com/eklausme/saaze-mobility). The demo-site is here: [mobility](https://eklausmeier.goip.de/mobility).

Using _Simplified Saaze_ will further provide MathJax, Twitter, CodePen, image galleries, sitemap, and all the other goodies. In particular it is quite easy to add
1. Search functionality, if you have PHP on the web-server
2. Light and dark mode


__1. Comparison.__ In [Analysis of Website Performance #2](https://eklausmeier.goip.de/blog/2022/12-27-analysis-of-website-performance-p2) I measured performance of the original [open-e-mobility.io](http://open-e-mobility.io) website. Measurement was done by using [pingdom](https://tools.pingdom.com). The performance of the original site is not too bad, but not really fast. Accessing the home page from Frankfurt is ca. two seconds. The new site is a tenth of that.

Feature            | Original | Simplified Saaze
:------------------|---------:|-----------------:
Performance grade  | C 72     | A 91
Load time          | 1.78 s   | 0.179 s
Number of requests | 69       | 16
Page size          | 2.3 MB   | 266.2 KB

Another comparison regarding the blog index: [The Open E-Mobility blog](https://open-e-mobility.io/blog) vs. _Simplified Saaze_ version.

Feature            | Original | Simplified Saaze
:------------------|---------:|-----------------:
Performance grade  | C 75     | A 97
Load time          | 1.36 s   | 0.183 s
Number of requests | 63       | 11
Page size          | 1.8 MB   | 186.8 KB

It was an explicit goal to be fast.


__2. Installation.__ Run
```bash
composer create-project eklausme/saaze-mobility
```
This will copy the files of this Git repository, it will also install _Simplified Saaze_. To run _Simplified Saaze_ you still need to compile one C program, install one PECL (PHP extension), and configure one PHP file. This is something you have to do only once. These steps are described in [Installation](https://eklausmeier.goip.de/blog/2021/10-31-simplified-saaze/#installation).
1. install php-yaml extension, see [PECL's Yaml Way Faster Than Symfony's Yaml](https://eklausmeier.goip.de/blog/2021/10-06-pecls-yaml-way-faster-than-symfonys-yaml)
2. compile `php_md4c_toHtml.c`

Once everything is installed, switch to the directory and run
```bash
php saaze -mr
```
Runtime should be a fraction of a second. The options used:
1. `-m` is used to generate a sitemap
2. `-r` generates RSS XML feed

Assuming you installed everything in `~/saaze-mobility`, then for deployment on my local web-server I use below command line:
```bash
( rm -rf /srv/http/mobility; cd /srv/http; mv ~/saaze-mobility/build ./mobility ; cd mobility; ln -s ~/saaze-mobility/public/img )
```


__3. Conversion.__ For the conversion of [open-e-mobility.io](http://open-e-mobility.io) to Markdown I simply used copy-and-paste from browser page directly. This approach is feasible here, as the original website only contains very few pages, and each pages contain few text. I converted only 31 pages.


__4. Templates and configuration.__ There are two so called collections, `blog.yml` and `aux.yml`. Both set `rss: true`, and set `entry_route: /{slug}`. So blog posts and auxiliary pages "mix" at the top directory.

Many Markdown files contain three additional entries in frontmatter managing multi-lingual. For example:
```yaml
lang: "en"
de: "de/de-home"
fr: "fr/accueil"
```
Entry `lang` sets the language, in which the entry is shown. In above example the language is English. The German translation is to be found in `de/de-home`. The French translation is found in `fr/accueil`. If there is no translation available you drop the entry in the yaml-file.

The blog entries contain another yaml entry for the [hero image](https://www.w3schools.com/howto/howto_css_hero_image.asp). For example:
```yaml
heroimg: "microphone_01-1-400x267.jpg"
```
This denotes where to find the hero image. The entry-template checks whether a hero image is present.

Templates are pretty standard:
- An `entry.php` for all entries, except blog-indexes.
- `index.php` for the blog index.
- `error.php` for any system error messages.
- `top-layout.php` for the commonalities at the top, which is further split into a separate `header.php`. `top-layout.php` also contains all CSS.
- `bottom-layout.php` contains all commonalities for all bottom parts of all pages.

Care has been taken in the templates to keep everything relative, i.e., the site can be moved up or down in the file hierarchy. One aid here is the use of the `$rbase` (relative base) variable.




