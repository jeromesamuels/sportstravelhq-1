<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            0  =>
                [
                    'pageID'      => 1,
                    'title'       => 'Homepage',
                    'alias'       => 'home',
                    'sinopsis'    => '',
                    'note'        => '[sc:Sximo fnc=showForm|id=usertrips] [/sc]',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-10-10 03:29:00',
                    'filename'    => 'homepage',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0","4":"0","5":"0","6":"0"}',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => 'tet',
                    'metadesc'    => 'tetet',
                    'default'     => '1',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 0,
                    'userid'      => 0,
                    'image'       => '',
                ],
            1  =>
                [
                    'pageID'      => 26,
                    'title'       => 'Contact Us',
                    'alias'       => 'contact-us',
                    'sinopsis'    => '',
                    'note'        => '<section class=" section bg-gray text-center" id="contact">
        <div class="container">
                <h1 class=""> Contact Us </h1>  
                <p class="lead"> Write desctiption here ... </p>
                        <div style="text-align:left">
                                [sc:Form fnc=render|id=2] [/sc] 
                        </div><br>
                <p><strong>© 2015 Company Name</strong><br> consectetur adipisicing elit. Aut eaque, laboriosam veritatis,</p><p> quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>            
        </div>
</section>',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-03 07:41:11',
                    'filename'    => 'fullpage',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 46,
                    'userid'      => 0,
                    'image'       => '',
                ],
            2  =>
                [
                    'pageID'      => 27,
                    'title'       => 'Why Choose Us ?',
                    'alias'       => 'why-choose-us',
                    'sinopsis'    => '',
                    'note'        => '        <div class="row">
                <div class="col-sm-6 col-md-6">
                        <div>
                                <h4>Valuable counselling requires insight.</h4>
                                <p>We take the time to understand our clients businesses.</p>
                                <p>Brandt & Lauritzen is a specialised Danish law firm with business-minded attorneys.</p>
                                <p>We ensure value-creating counselling by combining our in-depth knowledge of the legal framework in Denmark and our understanding of the business side of the matters. We believe valuable counselling requires more than simply an understanding of the legal issues at hand,
                                it also requires insight into our clients industries in a commercial context.</p>
                        </div>
                </div>
                <div class="col-sm-6 col-md-6">
                        <div class="ab1-img">
                                <img src="http://release.sximo5.net/uploads/images/services/img1.jpg" alt="Image">
                        </div>
                </div>
        </div>
',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-04 00:27:32',
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 60,
                    'userid'      => 0,
                    'image'       => '',
                ],
            3  =>
                [
                    'pageID'      => 29,
                    'title'       => 'How it Works',
                    'alias'       => 'how-it-works',
                    'sinopsis'    => '',
                    'note'        => '<section class="section">
        <div class="container clearfix">
                <div class="col-md-4 ">
                        <div class="feature-box media-box">
                                <div class="fbox-media">
                                        <img src="./uploads/images/services/1.jpg" alt="Why choose Us?">
                                </div>
                                <div class="fbox-desc">
                                        <h3>Why choose Us.<span class="subtitle">Because we are Reliable.</span></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi rem, facilis nobis voluptatum est voluptatem accusamus molestiae eaque perspiciatis mollitia.</p>
                                </div>
                        </div>
                </div>

                <div class="col-md-4 ">
                        <div class="feature-box media-box">
                                <div class="fbox-media">
                                        <img src="./uploads/images/services/2.jpg" alt="Why choose Us?">
                                </div>
                                <div class="fbox-desc">
                                        <h3>Our Mission.<span class="subtitle">To Redefine your Brand.</span></h3>
                                        <p>Quos, non, esse eligendi ab accusantium voluptatem. Maxime eligendi beatae, atque tempora ullam. Vitae delectus quia, consequuntur rerum molestias quo.</p>
                                </div>
                        </div>
                </div>

                <div class="col-md-4  col_last">
                        <div class="feature-box media-box">
                                <div class="fbox-media">
                                        <img src="./uploads/images/services/3.jpg" alt="Why choose Us?">
                                </div>
                                <div class="fbox-desc">
                                        <h3>What we Do.<span class="subtitle">Make our Customers Happy.</span></h3>
                                        <p>Porro repellat vero sapiente amet vitae quibusdam necessitatibus consectetur, labore totam. Accusamus perspiciatis asperiores labore esse ab accusantium ea modi ut.</p>
                                </div>
                        </div>
                </div>

        </div>
</section>      
<section class="section bg-gray">

        <div class="container clearfix">

                <div class="section-title">
                        Easy Configurable Options                       
                </div>

                <div class="section-subcontent text-center">
                      Choose from a wide array of Options for your best matched Customizations

                </div>
<div class="text-center">
                        <img data-animate="fadeIn" class="aligncenter fadeIn animated" src="./uploads/images/services/macbook.png" alt="Macbook">
</div>


                <div class="col-md-4">

                        <div class="feature-box fbox-plain">
                                <div class="fbox-icon">
                                        <a href="#"><i class="i-alt">1.</i></a>
                                </div>
                                <h3>Choose a Product.</h3>
                                <p>Perferendis, nam. Eum aperiam vel animi beatae corporis dignissimos, molestias, placeat, maxime optio ipsam nostrum atque quidem.</p>
                        </div>

                </div>

                <div class="col-md-4">

                        <div class="feature-box fbox-plain">
                                <div class="fbox-icon">
                                        <a href="#"><i class="i-alt">2.</i></a>
                                </div>
                                <h3>Enter Shipping Info.</h3>
                                <p>Saepe qui enim at animi. Repellendus, blanditiis doloremque asperiores reprehenderit deleniti. Ipsam nam accusantium ex!</p>
                        </div>

                </div>

                <div class="col-md-4 col_last">

                        <div class="feature-box fbox-plain">
                                <div class="fbox-icon">
                                        <a href="#"><i class="i-alt">3.</i></a>
                                </div>
                                <h3>Complete your Payment.</h3>
                                <p>Necessitatibus accusamus, inventore atque commodi, animi architecto ea sed, suscipit tempora ex deleniti quae. Consectetur, sint velit.</p>
                        </div>

                </div>

        </div>

</section>',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-03 10:16:43',
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 42,
                    'userid'      => 0,
                    'image'       => '',
                ],
            4  =>
                [
                    'pageID'      => 45,
                    'title'       => 'Term Of Condition',
                    'alias'       => 'toc',
                    'sinopsis'    => '',
                    'note'        => '<div class="section-title">Term Of Condition</div><p>Suspendisse mattis, tortor a elementum ullamcorper, tortor elit vestibulum mauris</p><blockquote><p>consectetur adipiscing elit. Ut id mauris vulputate, luctus erat et, porttitor mauris. </p></blockquote><p>Cras ultricies tortor tempus orci aliquam, congue congue urna molestie. Integer tristique ac sem sed tincidunt. Suspendisse mattis, tortor a elementum ullamcorper, tortor elit vestibulum mauris, quis mattis leo lorem vel quam. Nullam elementum quam et condimentum tempor. Quisque dignissim leo imperdiet sollicitudin sollicitudin. Praesent laoreet nisl at dolor pharetra consequat. Morbi condimentum egestas nisi, efficitur placerat augue posuere id. Vivamus mattis dolor a urna elementum fermentum. Etiam auctor elementum consectetur.In id neque vel tellus rhoncus molestie. </p><blockquote><p>Nulla interdum semper magna, eu gravida lorem mollis eget. In sed viverra velit. Morbi rutrum ante hendrerit, vehicula dolor at, suscipit elit. Vestibulum a mauris tristique, fermentum est nec, rutrum nibh. Duis in semper metus. Nunc maximus, ex id fringilla sagittis, nisl metus bibendum lacus, quis placerat diam quam sed justo. Nullam varius dapibus purus, et malesuada ipsum pulvinar posuere. Fusce sit amet sem tincidunt, suscipit dolor at, bibendum est. Vivamus porta in lectus sed ultrices. Nam viverra mauris a hendrerit posuere. Donec elementum velit nisi, a eleifend augue blandit hendrerit. Donec id pulvinar est.Integer vitae orci sapien. Integer at urna lorem. Praesent nec ante suscipit, tincidunt nibh quis, dapibus tellus. Curabitur quis odio faucibus, pretium mauris eu, pretium eros. </p></blockquote><p><br></p><p>Morbi nec nibh ullamcorper, dignissim arcu sit amet, lobortis ligula. Duis fermentum, quam vel sollicitudin rutrum, ex risus ornare dolor, eget volutpat velit purus a purus. Nullam sed iaculis enim. Aenean ac pellentesque sem. Aliquam blandit libero nunc, nec rutrum mi lacinia eget. Aenean ultricies, quam ut ultricies ullamcorper, nibh dolor viverra ipsum, ac vestibulum purus ante a massa.Nulla bibendum, lectus eget lobortis vehicula, lectus ante congue augue, in tempus tellus tortor et diam. Phasellus lorem dolor, rutrum sit amet dapibus et, malesuada venenatis enim. Donec tincidunt turpis quam, a convallis eros scelerisque a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus eget mi ipsum. Donec non lorem sem. Phasellus sed tortor non ligula congue faucibus vitae imperdiet nisl. </p><p><br></p><p>Cras dolor ante, condimentum at elementum mollis, hendrerit in lorem. Phasellus eu enim ante. Cras erat dui, cursus suscipit sem sit amet, congue varius enim. Nam purus sem, gravida non lacus eget, porta fringilla nibh. Praesent egestas felis at risus ullamcorper, at condimentum mauris scelerisque. Etiam eget eros laoreet, vestibulum dui eu, vehicula leo. Nulla sagittis nibh nibh, sit amet interdum ligula feugiat eget. Aliquam vitae ex tincidunt, facilisis massa ut, viverra sem.Praesent diam justo, fermentum in maximus vitae, tristique vel orci. Integer a facilisis neque. Nunc eu justo urna. Praesent commodo eget diam a commodo. Nulla viverra pulvinar justo sed auctor. Maecenas rutrum tincidunt hendrerit. Nunc fringilla sem id sem suscipit tincidunt. Donec condimentum lobortis sem eget blandit.</p>',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-03 13:20:26',
                    'filename'    => '',
                    'status'      => 'enable',
                    'access'      => '',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 2,
                    'userid'      => 0,
                    'image'       => '',
                ],
            5  =>
                [
                    'pageID'      => 46,
                    'title'       => 'Privacy Policy',
                    'alias'       => 'privacy',
                    'sinopsis'    => '',
                    'note'        => '[sc:Sximo fnc=render|id=comment] [/sc]<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id mauris vulputate, luctus erat et, porttitor mauris. Cras ultricies tortor tempus orci aliquam, congue congue urna molestie. Integer tristique ac sem sed tincidunt. Suspendisse mattis, tortor a elementum ullamcorper, tortor elit vestibulum mauris, quis mattis leo lorem vel quam. Nullam elementum quam et condimentum tempor. Quisque dignissim leo imperdiet sollicitudin sollicitudin. <br>oncus molestie. Nulla interdum semper magna, eu gravida lorem mollis eget. In sed viverra velit. <br></p><br>Morbi rutrum ante hendrerit, vehicula dolor at, suscipit elit. Vestibulum a mauris tristique, fermentum est nec, rutrum nibh. Duis in semper metus. Nunc maximus, ex id fringilla sagittis, nisl metus bibendum lacus, quis placerat diam quam sed justo. Nullam varius dapibus purus, et malesuada ipsum pulvinar posuere. Fusce sit amet sem tincidunt, suscipit dolor at, bibendum est. Vivamus porta in lectus sed ultrices. Nam viverra mauris a hendrerit posuere. <br><br>Donec elementum velit nisi, a eleifend augue blandit hendrerit. Donec id pulvinar est.Integer vitae orci sapien. Integer at urna lorem. Praesent nec ante suscipit, tincidunt nibh quis, dapibus tellus. Curabitur quis odio faucibus, pretium mauris eu, pretium eros. Morbi nec nibh ullamcorper, dignissim arcu sit amet, lobortis ligula. <br><br>Duis fermentum, quam vel sollicitudin rutrum, ex risus ornare dolor, eget volutpat velit purus a purus. Nullam sed iaculis enim. Aenean ac pellentesque sem. Aliquam blandit libero nunc, nec rutrum mi lacinia eget. <p></p><br><p></p>',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-03 13:18:42',
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 58,
                    'userid'      => 0,
                    'image'       => '',
                ],
            6  =>
                [
                    'pageID'      => 47,
                    'title'       => 'Printing And Typesetting Industries',
                    'alias'       => 'printing-and-typesetting-industry',
                    'sinopsis'    => '',
                    'note'        => 'printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br><br>printing and typesetting industry Lorem Ipsum has been the industry\'s 
standard dummy text ever since the 1500s, when an unknown printer took a
 galley of type and scrambled it to make a type specimen book.<br><hr>

<div class="someclass" id="someid" markdown="1">
    Insert markdown here greate !<br></div>

class PostsController extends Controller<br><br>printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br><br><pre>class PostsController extends Controller {

        protected $layout = "layouts.main";
        protected $data = array();      
        public $module = \'posts\';
        static $per_page        = \'10\';
        public function __construct()
        {
        }
}

</pre>


 <br><br>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum

is simply dummy text of the <br><span style="font-weight: bold;"><br>printing and typesetting industry</span><br><br>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.

 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
                    'created'     => '2017-04-22 00:00:00',
                    'updated'     => '2017-11-04 00:31:28',
                    'filename'    => '',
                    'status'      => 'enable',
                    'access'      => '',
                    'allow_guest' => '1',
                    'template'    => '',
                    'metakey'     => 'printing and typesetting industry Lorem',
                    'metadesc'    => 'printing ,and typesetting, industry, Lorem,',
                    'default'     => '0',
                    'pagetype'    => 'post',
                    'labels'      => 'Finance , Accounting',
                    'views'       => 12,
                    'userid'      => 0,
                    'image'       => '1.jpg',
                ],
            7  =>
                [
                    'pageID'      => 48,
                    'title'       => 'New Blog Post Sept 2016',
                    'alias'       => 'new-blog-post-sept-2016',
                    'sinopsis'    => '',
                    'note'        => '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p><hr><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>',
                    'created'     => '2017-05-07 00:00:00',
                    'updated'     => '2018-12-17 13:26:19',
                    'filename'    => '',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => '',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'post',
                    'labels'      => 'Finance , Accounting',
                    'views'       => 12,
                    'userid'      => 0,
                    'image'       => '2.jpg',
                ],
            8  =>
                [
                    'pageID'      => 50,
                    'title'       => 'Remaining essentially unchanged',
                    'alias'       => '-remaining-essentially-unchanged',
                    'sinopsis'    => '',
                    'note'        => '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p><hr><p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>[mpro id="2"] test cotent here [/mpro]',
                    'created'     => '2017-09-03 00:00:00',
                    'updated'     => '2017-11-01 11:34:16',
                    'filename'    => '',
                    'status'      => 'enable',
                    'access'      => '',
                    'allow_guest' => '1',
                    'template'    => '',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'post',
                    'labels'      => 'Finance , Accounting',
                    'views'       => 8,
                    'userid'      => 0,
                    'image'       => '3.jpg',
                ],
            9  =>
                [
                    'pageID'      => 53,
                    'title'       => 'Backend Page',
                    'alias'       => 'page-backend',
                    'sinopsis'    => '',
                    'note'        => '<p></p><div style="text-align: center;">I<span style="font-size: 18px;">nteger vitae orci sapien. Integer at urna lorem. Praesent nec ante suscipit, </span></div><div style="text-align: center;"><span style="font-size: 18px;">tincidunt nibh quis, dapibus tellus. Curabitur quis odio faucibus, </span></div><div style="text-align: center;"><span style="font-size: 18px;">pretium mauris eu, pretium eros.</span> <br></div><br>Morbi nec nibh ullamcorper, dignissim arcu sit amet, lobortis ligula. Duis fermentum, quam vel sollicitudin rutrum, ex risus ornare dolor, eget volutpat velit purus a purus. Nullam sed iaculis enim. Aenean ac pellentesque sem. <br><p></p><p><br>&nbsp;Nullam elementum quam et condimentum tempor. Quisque dignissim leo imperdiet sollicitudin sollicitudin. </p><br><p><br></p>',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-10-10 03:28:34',
                    'filename'    => 'backend',
                    'status'      => 'enable',
                    'access'      => '',
                    'allow_guest' => '1',
                    'template'    => 'backend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 0,
                    'userid'      => 0,
                    'image'       => '',
                ],
            10 =>
                [
                    'pageID'      => 69,
                    'title'       => 'Screenshots',
                    'alias'       => 'screenshots',
                    'sinopsis'    => '',
                    'note'        => '<ul class="thumbs">            <li><a href="#thumb1" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/1.jpg\')">                <h4>Web development</h4><span class="description">Get the latest technologies</span></a>            </li>            <li>                <a href="#thumb2" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/2.jpg\')"><h4>SEO</h4><span class="description">Fast and reliable performance</span></a>            </li>            <li>                <a href="#thumb3" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/3.jpg\')"><h4>Web design</h4><span class="description">Slick and responsive website</span></a>            </li>            <li>                <a href="#thumb4" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/4.jpg\')"><h4>Project management</h4><span class="description">Reduce costs and increase productivity</span></a>            </li>            <li>                <a href="#thumb5" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/5.jpg\')"><h4>Graphic design</h4><span class="description">Brochures, logos, banners</span></a>            </li>            <li>                <a href="#thumb6" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/6.jpg\')"><h4>SEO</h4><span class="description">Nunc condimentum magna</span></a>            </li>            <li>                <a href="#thumb7" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/7.jpg\')"><h4>Graphic design</h4><span class="description">Nunc condimentum magna</span></a>            </li>            <li>                <a href="#thumb8" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/8.jpg\')"><h4>Graphic design</h4><span class="description">Morbi pellentesque quam vitae</span></a>            </li>            <li>                <a href="#thumb9" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/9.jpg\')"><h4>Web development</h4><span class="description">Phasellus ultrices, dolor sit amet dapibus</span></a>            </li>            <li>                <a href="#thumb10" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/10.jpg\')"><h4>Web design</h4><span class="description">Vivamus massa dolor, commodo</span></a>            </li>            <li>                <a href="#thumb11" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/11.jpg\')"><h4>Graphic design</h4><span class="description">Sed lobortis at nisl non pellentesque</span></a>            </li>            <li>                <a href="#thumb12" class="thumbnail" style="background-image: url(\'./uploads/images/portfolio/9.jpg\')"><h4>Fron-end development</h4><span class="description">Proin lorem est, rhoncus ullamcorper </span></a>            </li>        </ul>        <div class="portfolio-content">            <div id="thumb1">                <div class="media"><img src="./uploads/images/portfolio/1.jpg"></div>                <h1>Web development</h1>                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis nisi sit amet metus venenatis, ut congue turpis aliquet. Pellentesque eget elit sollicitudin, feugiat felis in, ornare diam. Morbi blandit sapien nibh, eu pulvinar tortor luctus nec. Aenean lobortis lacus cursus gravida adipiscing. Praesent in odio porta, placerat felis id, viverra est. Nam magna quam, tincidunt eget augue in, aliquet tristique ipsum.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb2">                <div class="media"><img src="./uploads/images/portfolio/2.jpg"></div>                <h1>SEO</h1>                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Integer a posuere tortor. Praesent malesuada mauris massa, non blandit neque tempus nec. Quisque fermentum nunc non hendrerit tempus.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb3">                <div class="media"><img src="./uploads/images/portfolio/3.jpg"></div>                <h1>Web design</h1>                <p>Ut condimentum eros bibendum metus lacinia, ac condimentum justo faucibus. Nam nec dui convallis, sodales sapien in, gravida justo. Pellentesque pulvinar massa a nisl iaculis, quis iaculis elit tincidunt.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb4">                <div class="media"><img src="./uploads/images/portfolio/4.jpg"></div>                <h1>Project management</h1>                <p>Suspendisse cursus commodo elit, at tempus felis hendrerit vel. Cras condimentum aliquam mauris at blandit. Pellentesque ac velit iaculis, lobortis nibh id, ultricies ante. Fusce vel urna justo. Maecenas rhoncus vel ligula eget feugiat. Maecenas blandit risus eros, vel imperdiet augue dapibus vitae.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb5">                <div class="media"><img src="./uploads/images/portfolio/5.jpg"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb6">                <div class="media"><img src="./uploads/images/portfolio/6.jpg"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb7">                <div class=" media" =""=""><img src="./uploads/images/portfolio/7.jpg"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb8">                <div class="media"><img src="./uploads/images/portfolio/8.jpg"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb9">                <div class="media"><img src="./uploads/images/portfolio/9.jpg"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb10">                <div class="media"><img src="./uploads/images/portfolio/10.jpg"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb11">                <div class="media"><img src="./uploads/images/portfolio/11.jpg"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div>            <div id="thumb12">                <div class="media"><img src="./uploads/images/portfolio/10.jpg"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href="#" class="btn btn-primary">Learn More</a>            </div></div>',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-03 07:42:43',
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 12,
                    'userid'      => 0,
                    'image'       => '',
                ],
            11 =>
                [
                    'pageID'      => 70,
                    'title'       => 'New Ultimate Blog ( Powefull CMS )',
                    'alias'       => 'new-ultimate-blog-powefull-cms',
                    'sinopsis'    => '',
                    'note'        => '<p><img style="width: 443.656px; height: 332.733px; float: left; margin:0 15px 0 0;" src="http://localhost/bitbucket/ultimate/public//uploads\\dropzone\\image10.jpg" class="note-float-left"></p><h3>Introducing Me<br></h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id mauris 
vulputate, luctus erat et, porttitor mauris. Cras ultricies tortor 
tempus orci aliquam, congue congue urna molestie. Integer tristique ac 
sem sed tincidunt. Suspendisse mattis, tortor a elementum ullamcorper, 
tortor elit vestibulum mauris, quis mattis leo lorem vel quam. Nullam 
elementum quam et condimentum tempor. Quisque dignissim leo imperdiet 
sollicitudin sollicitudin. <br>oncus molestie. Nulla interdum semper magna, eu gravida lorem mollis eget. In sed viverra velit. <br></p>',
                    'created'     => '2017-11-02 09:30:39',
                    'updated'     => '2018-12-17 13:27:32',
                    'filename'    => '',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => '',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'post',
                    'labels'      => 'ultimate , crud , admin',
                    'views'       => 5,
                    'userid'      => 0,
                    'image'       => '4.jpg',
                ],
            12 =>
                [
                    'pageID'      => 71,
                    'title'       => 'FAQ',
                    'alias'       => 'faq',
                    'sinopsis'    => '',
                    'note'        => '<ul id="portfolio-filter" class="portfolio-filter clearfix">

        <li class="active"><a href="#" data-filter="all">All</a></li>
        <li class=""><a href="#" data-filter=".faq-marketplace">Marketplace</a></li>
        <li class=""><a href="#" data-filter=".faq-authors">Authors</a></li>
        <li><a href="#" data-filter=".faq-legal">Legal</a></li>
        <li><a href="#" data-filter=".faq-itemdiscussion">Item Discussion</a></li>
        <li><a href="#" data-filter=".faq-affiliates">Affiliates</a></li>
        <li><a href="#" data-filter=".faq-miscellaneous">Miscellaneous</a></li>

</ul>

<div class="clear mb-20"></div>

<div id="faqs" class="faqs">

        <div class="toggle faq faq-marketplace faq-authors" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> How do I become an author?</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-authors faq-miscellaneous" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> Helpful Resources for Authors</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-miscellaneous" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> How much money can I make?</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-authors faq-legal faq-itemdiscussion" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> Can I offer my items for free on a promotional basis?</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-marketplace faq-authors" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> An Introduction to the Marketplaces for Authors</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-affiliates faq-miscellaneous" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> How does the Tuts+ Premium affiliate program work?</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-legal faq-itemdiscussion" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> What Images, Videos, Code or Music Can I Use in my Items?</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-legal faq-authors faq-itemdiscussion" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> Can I use trademarked names in my items?</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-affiliates" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> Tips for Increasing Your Referral Income</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-authors faq-itemdiscussion" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> How can I get support for an item which isn\'t working correctly?</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

        <div class="toggle faq faq-marketplace faq-itemdiscussion" style="">
                <div class="togglet"><i class="fa fa-question-sign"></i> How do I pay for items on the Marketplaces?</div>
                <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
        </div>

</div>
',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-04 03:04:17',
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 27,
                    'userid'      => 0,
                    'image'       => '',
                ],
            13 =>
                [
                    'pageID'      => 72,
                    'title'       => 'Pricing',
                    'alias'       => 'pricing',
                    'sinopsis'    => 'Here are a few sample from our works',
                    'note'        => '<br><div><div class="section"><div class="container"><p align="center">This is simple gallery mosaic , you can manage image via Backend CMS <br></p>
        [sc:cms fnc=gallery|id=7 ] [/sc]

        </div><p></p>
</div>  </div>',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-04 03:52:43',
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 26,
                    'userid'      => 0,
                    'image'       => '',
                ],
            14 =>
                [
                    'pageID'      => 73,
                    'title'       => 'Team',
                    'alias'       => 'team',
                    'sinopsis'    => '',
                    'note'        => '<div class="row teams clearfix">
        
        <div class="container-title title-border mb-40">
                <h4> 3 Columns </h4>
        </div>

        <div class="col-md-4">
                <div class="image">
                        <img src="./uploads/images/team/2.jpg">
                </div>
                <div class="info">
                        <h4> Mangopik </h4>
                        <span> CEO Sximo NET </span>
                        <div class="social">
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon">
                                        <i class="fa fa-google"></i>
                                        <i class="fa fa-google"></i>
                                </a>
                        </div>
                </div>
        </div>

        <div class="col-md-4">
                <div class="image">
                        <img src="./uploads/images/team/3.jpg">
                </div>
                <div class="info">
                        <h4> Ivan </h4>
                        <span> Senior Programmer </span>
                        <div class="social">
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon">
                                        <i class="fa fa-google"></i>
                                        <i class="fa fa-google"></i>
                                </a>
                        </div>
                </div>
        </div>

        <div class="col-md-4">
                <div class="image">
                        <img src="./uploads/images/team/4.jpg">
                </div>
                <div class="info">
                        <h4> Santo </h4>
                        <span> Creative Design </span>
                        <div class="social">
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon">
                                        <i class="fa fa-google"></i>
                                        <i class="fa fa-google"></i>
                                </a>
                        </div>
                </div>
        </div>

        <div class="container-title title-border mb-40">
                <h4> 4 Columns </h4>
        </div>

        <div class="col-md-3">
                <div class="image">
                        <img src="./uploads/images/team/2.jpg">
                </div>
                <div class="info">
                        <h4> Mangopik </h4>
                        <span> CEO Sximo NET </span>
                        <div class="social">
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon">
                                        <i class="fa fa-google"></i>
                                        <i class="fa fa-google"></i>
                                </a>
                        </div>
                </div>
        </div>

        <div class="col-md-3">
                <div class="image">
                        <img src="./uploads/images/team/3.jpg">
                </div>
                <div class="info">
                        <h4> Ivan </h4>
                        <span> Senior Programmer </span>
                        <div class="social">
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon">
                                        <i class="fa fa-google"></i>
                                        <i class="fa fa-google"></i>
                                </a>
                        </div>
                </div>
        </div>

        <div class="col-md-3">
                <div class="image">
                        <img src="./uploads/images/team/4.jpg">
                </div>
                <div class="info">
                        <h4> Santo </h4>
                        <span> Creative Design </span>
                        <div class="social">
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon">
                                        <i class="fa fa-google"></i>
                                        <i class="fa fa-google"></i>
                                </a>
                        </div>
                </div>
        </div>
        <div class="col-md-3">
                <div class="image">
                        <img src="./uploads/images/team/8.jpg">
                </div>
                <div class="info">
                        <h4> Margareta </h4>
                        <span> Finance </span>
                        <div class="social">
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="social-icon ">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon">
                                        <i class="fa fa-google"></i>
                                        <i class="fa fa-google"></i>
                                </a>
                        </div>
                </div>
        </div>
</div>          ',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-04 02:12:18',
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 17,
                    'userid'      => 0,
                    'image'       => '',
                ],
            15 =>
                [
                    'pageID'      => 74,
                    'title'       => 'Galleries',
                    'alias'       => 'galleries',
                    'sinopsis'    => 'Galleries with mansonry plugins',
                    'note'        => '<div class="clearfix">
<div class="portfolio-mansonry-grid" id="portfolio-mansonry-grid">      

        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/1.jpg" alt="Open Imagination">
        </div>
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/2.jpg" alt="Open Imagination">
        </div>
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/3.jpg" alt="Open Imagination">
        </div>
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/4.jpg" alt="Open Imagination">
        </div>
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/5.jpg" alt="Open Imagination">
        </div>
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/6.jpg" alt="Open Imagination">
        </div>
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/7.jpg" alt="Open Imagination">
        </div>
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/8.jpg" alt="Open Imagination">
        </div>

        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/9.jpg" alt="Open Imagination">
        </div>
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/10.jpg" alt="Open Imagination">
        </div>          
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/11.jpg" alt="Open Imagination">
        </div>  
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/12.jpg" alt="Open Imagination">
        </div>  
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/7.jpg" alt="Open Imagination">
        </div>  
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/11.jpg" alt="Open Imagination">
        </div>  
        <div class="item">
                <img src="./uploads/images/portfolio/4/mixed/12.jpg" alt="Open Imagination">
        </div>  
                
</div>
</div>',
                    'created'     => '1970-01-01 00:00:00',
                    'updated'     => '2017-11-04 08:33:10',
                    'filename'    => 'fullpage',
                    'status'      => 'enable',
                    'access'      => '',
                    'allow_guest' => '1',
                    'template'    => 'frontend',
                    'metakey'     => '',
                    'metadesc'    => '',
                    'default'     => '0',
                    'pagetype'    => 'page',
                    'labels'      => '',
                    'views'       => 27,
                    'userid'      => 0,
                    'image'       => '',
                ],
            16 =>
                [
                    'pageID'      => 78,
                    'title'       => 'Trips',
                    'alias'       => 'trips',
                    'sinopsis'    => null,
                    'note'        => '[sc:Sximo fnc=render|id=usertrips] [/sc]',
                    'created'     => null,
                    'updated'     => null,
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"1","3":"0","4":"1"}',
                    'allow_guest' => null,
                    'template'    => 'frontend',
                    'metakey'     => null,
                    'metadesc'    => null,
                    'default'     => '0',
                    'pagetype'    => null,
                    'labels'      => null,
                    'views'       => 1887,
                    'userid'      => null,
                    'image'       => null,
                ],
            17 =>
                [
                    'pageID'      => 79,
                    'title'       => 'Teams',
                    'alias'       => 'teams',
                    'sinopsis'    => null,
                    'note'        => 'This is teams page . . .',
                    'created'     => null,
                    'updated'     => null,
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => null,
                    'template'    => 'frontend',
                    'metakey'     => null,
                    'metadesc'    => null,
                    'default'     => '0',
                    'pagetype'    => null,
                    'labels'      => null,
                    'views'       => 85,
                    'userid'      => null,
                    'image'       => null,
                ],
            18 =>
                [
                    'pageID'      => 80,
                    'title'       => 'Preferences ',
                    'alias'       => 'preferences',
                    'sinopsis'    => null,
                    'note'        => 'This is preferences page',
                    'created'     => null,
                    'updated'     => null,
                    'filename'    => 'page',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0"}',
                    'allow_guest' => null,
                    'template'    => 'frontend',
                    'metakey'     => null,
                    'metadesc'    => null,
                    'default'     => '0',
                    'pagetype'    => null,
                    'labels'      => null,
                    'views'       => 35,
                    'userid'      => null,
                    'image'       => null,
                ],
            19 =>
                [
                    'pageID'      => 81,
                    'title'       => 'Book a Hotel',
                    'alias'       => 'book-a-hotel',
                    'sinopsis'    => null,
                    'note'        => '[sc:Sximo fnc=showForm|id=usertrips] [/sc]',
                    'created'     => null,
                    'updated'     => null,
                    'filename'    => 'homepage',
                    'status'      => 'enable',
                    'access'      => '{"1":"1","2":"0","3":"0","4":"1","5":"0","6":"0"}',
                    'allow_guest' => null,
                    'template'    => 'frontend',
                    'metakey'     => null,
                    'metadesc'    => null,
                    'default'     => '0',
                    'pagetype'    => null,
                    'labels'      => null,
                    'views'       => 2,
                    'userid'      => null,
                    'image'       => null,
                ],
        ];

        foreach ($pages as $page_data) {
            \DB::table('tb_pages')->insert($page_data);
        }
    }
}
