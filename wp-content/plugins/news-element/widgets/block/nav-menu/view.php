<?php
use News_Element\Khobish_Helper;
?>
<div class="ne-nav-menu">
<?php if ($settings['native']) {
    //phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
    Khobish_Helper::render_nav_menu($settings['menu']);
} else {
    //phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
    Khobish_Helper:: rendor_custom_nav_menu($settings['menus']);
} ?>
</div>

<style>
/* .tp-menu-wrap {
    margin: 0;
    list-style: none;
    padding: 0;
    align-items: center;
}
.tp-menu-wrap li {
    display: inline-block;
    position: relative;
}
.tp-menu-wrap li.tp_mega_menu {
    position: static;
}
.tp-menu-wrap .sub-menu {
    margin-left: 0;
    left: 0;
    list-style: none;
    padding: 0;
    position: absolute;
    top: 100%;
    visibility: hidden;
    opacity: 0;
    margin-top: 30px;
    transition: all 0.3s ease 0s;
}
.tp-menu-wrap li:hover>.sub-menu {
    margin-top: 0;
    opacity: 1;
    visibility: visible;
    z-index: 999;
}
.tp-menu-wrap .sub-menu li, .tp-menu-wrap .sub-menu li a {
    display: block;
    line-height: initial;
}
.poscenter .ne-megamenu-content-wrapper {
    left: 0;
}
.ne-megamenu-content-wrapper {
    position: absolute;
    top: 100%;
    width: 100%;
    z-index: -999;
    visibility: hidden;
    opacity: 0;
    margin-top: 30px;
    transition: all 0.3s ease 0s;
}
.tp-menu-wrap li.tp_mega_menu:hover .ne-megamenu-content-wrapper {
    margin-top: 0;
    opacity: 1;
    visibility: visible;
    z-index: 999;
}
.tp-menu-wrap:hover>li {
    opacity: .5;
}

.tp-menu-wrap>li:hover {
    opacity: 1;
}
.tp-menu-wrap .sub-menu .sub-menu {
    left: 100%;
    top: 0;
}
.tp-menu-wrap>li>a{
    position: relative;  
}
.tp-menu-wrap>li>a::before {
    content:"";
    display: block;
    height: 0px;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: black;
}
.tp-menu-wrap>li>a:hover::before{
  height: 2px;
} */
</style>