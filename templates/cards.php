<?php

function testArticle() {
    echo '
        <li class="collection-item col s12">
            <div>
                <a href="#"><h4>Test Article</h4></a>
                <p class="flow-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos,
                </p>
            </div>
        </li>
    ';
}
function small_thumb_slide($title, $image) {
  echo '
    <div class="col s12 m4 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="'. $image .'">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">'. $title .'
                    <i class="material-icons right">more_vert</i>
                </span>
                <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">'. $title .'<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
    </div>
  ';
}
function big_thumb_slide() {
  echo '
    <div class="col s12">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="http://lorempixel.com/output/technics-q-c-640-480-6.jpg">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">
                    Card Title<i class="material-icons right">more_vert</i>
                </span>
                <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
    </div>
  ';
}
function small_text_normal() {
  echo '
        <div class="col s12">
            <div class="card red darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    </div>
  ';
}
function big_thumb_normal() {
  echo '
        <div class="col s12">
            <div class="card">
                <div class="card-image">
                    <img src="http://lorempixel.com/output/nightlife-q-c-640-480-5.jpg">
                    <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi recusandae facere at.
                        Rerum optio sit, dolor quam, animi inventore magni ex facere nihil quis atque, corrupti ipsa! Quia, voluptatum libero.
                    </p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
  ';
}


$restHTML = '

<div class="row container left">
    <!-- Card row start-->





<!--Card  Row end -->
<div class="row">
    <!-- Card row start-->




    <div class="col s12">
        <div class="card blue-grey darken-3">
            <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi recusandae facere at.
                    Rerum optio sit, dolor quam, animi inventore magni ex facere nihil quis atque, corrupti ipsa! Quia, voluptatum
                    libero.
                </p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
</div>
<!--Card  Row end -->
<div class="row">
    <!-- Card row start-->
    <div class="col s12">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="http://lorempixel.com/output/sports-q-c-640-480-5.jpg">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Card Title
                    <i class="material-icons right">more_vert</i>
                </span>
                <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, officia reiciendis.</p>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="card">
            <div class="card-image">
                <img src="http://lorempixel.com/output/cats-q-c-640-480-1.jpg">
                <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi recusandae facere at.
                    Rerum optio sit, dolor quam, animi inventore magni ex facere nihil quis atque, corrupti ipsa! Quia, voluptatum
                    libero.
                </p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="card green darken-1">
            <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi recusandae facere at.
                    Rerum optio sit, dolor quam, animi inventore magni ex facere nihil quis atque, corrupti ipsa! Quia, voluptatum
                    libero.
                </p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
</div>
<!--Card  Row end -->
';

?>
