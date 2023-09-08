<?php
$session = session(); ?>



<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html"></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">


        <div id='content'>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#jqxMenu").jqxMenu({
                        width: '100%',
                        height: '30px'
                    });
                    $("#jqxMenu").css('visibility', 'visible');

                    var centerItems = function() {
                        var firstItem = $($("#jqxMenu ul:first").children()[0]);
                        firstItem.css('margin-left', 0);
                        var width = 0;
                        var borderOffset = 2;
                        $.each($("#jqxMenu ul:first").children(), function() {
                            width += $(this).outerWidth(true) + borderOffset;
                        });
                        var menuWidth = $("#jqxMenu").outerWidth();
                        firstItem.css('margin-left', (menuWidth / 2) - (width / 2));
                    }
                    centerItems();
                    $(window).resize(function() {
                        centerItems();
                    });
                });
            </script>
            <div style="visibility: hidden;" id='jqxMenu'>
                <ul>
                    <li><a href="#Home">Home</a></li>
                   
                    <li>Users Manager
                        <ul>
                            <li><a href="#PCProducts">Users</a></li>
                            <li><a href="#MobileProducts">Users Groups</a></li>
                        </ul>
                    </li>
                    <li>Support
                        <ul style='width: 200px;'>
                            <li><a href="#SupportHome">Support home</a></li>
                            <li><a href="#CustomerService">Customer Service</a></li>
                            <li><a href="#KB">Knowledge base</a></li>
                            <li><a href="#Books">Books</a></li>
                            <li><a href="#Training">Training and certification</a></li>
                            <li><a href="#SupportPrograms">Support programs</a></li>
                            <li><a href="#Forums">Forums</a></li>
                            <li><a href="#Documentation">Documentation</a></li>
                            <li><a href="#Updates">Updates</a></li>
                        </ul>
                    </li>
                    <li>Communities
                        <ul style='width: 200px;'>
                            <li><a href="#Designers">Designers</a></li>
                            <li><a href="#Developers">Developers</a></li>
                            <li><a href="#Educators">Educators and students</a></li>
                            <li><a href="#Partners">Partners</a></li>
                            <li type='separator'></li>
                            <li>By resource</li>
                        </ul>
                    </li>
                    <li>Company
                        <ul style='width: 180px;'>
                            <li><a href="#About">About Us</a></li>
                            <li><a href="#Press">Press</a></li>
                            <li><a href="#Investor">Investor Relations</a></li>
                            <li><a href="#CorporateAffairs">Corporate Affairs</a></li>
                            <li><a href="#Careers">Careers</a></li>
                            <li><a href="#Showcase">Showcase</a></li>
                            <li><a href="#Events">Events</a></li>
                            <li><a href="#ContactUs">Contact Us</a></li>
                            <li><a href="#Become an affiliate">Become an affiliate</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>