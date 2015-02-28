<?php

if(isset($_POST['logout'])){
    session_destroy();
    session_unset();
    header("Location:index.php");
}
?>

<style type="text/css">

#newsMenu{
    background-color: #333;
    height:0px;
    width: 100%;
    z-index: 100000;
    overflow: scroll;



}
#statsMenu{
    background-color: #333;
    height:0px;
    width: 100%;
    z-index: 100000;    
    overflow: scroll;

}
#projectMenu{
    background-color: #333;
    height:0px;
    width: 100%;
    z-index: 100000;
    overflow: scroll;

} 
#organizationMenu{
    background-color: #333;
    height:0px;
    width: 100%;
    z-index: 100000;
    overflow: scroll;

} 




</style>

<div class="navbar navbar-inverse" id="topheader">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <div class="row" id="topheadertext">
            <div class="col-md-1"></div>
            <div class="col-md-2"></div>
            <div class="col-md-6"><h2>Sharity</h2></div>
            <div class="col-md-2"></div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>

<!-- Navigation -->
<div class="scroller_anchor"></div>
<nav class="navbar navbar-default top-nav-collapse scroller" role="navigation" id="navbarContainer">
    <div class="col-md-1"></div>
    <div class="col-md-10">

        <div class="container" >
            <div class="navbar-header page-scroll col-md-4">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="javascript:void(0)" id="menu_toggle">Menu</a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse col-md-6">

                <ul class="nav navbar-nav">

                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" name ="showProjectMenu" style="cursor:pointer;">Prosjekter</a>
                    </li>
                    <li>


                        <a class="page-scroll" name ="showNewsMenu" style="cursor:pointer;">News</a>
                        
                        
                        
                    </li>
                    <li>
                        <a class="page-scroll" name ="showStatsMenu" style="cursor:pointer;">Statistikk</a>
                        
                    </li>
                    <li>

                        <a class="page-scroll" name ="showOrganizationMenu" style="cursor:pointer;">My organization</a>
                    </li>


                </ul>

            </div>

            <!-- /.navbar-collapse -->
            <div class="col-md-2"></div>

            <!-- /.container -->
        </div>

        

        
    </div>
    
    <div class="col-md-1" id="logoutContainer">

        <form method="post">
            <input type="submit" name="logout" id="logoutbtn" value="Logg ut"/>
        </form>
    </div>
</nav>

<div class="menu_anchor"></div>

<div id="newsMenu" class="menus"><a href="showNews.php">News</a> - <a href="registerNews.php">Registrer news</a></div>
<div id="statsMenu" class="menus"><a href="statistics.php">Statistikk</a> </div>
<div id="projectMenu" class="menus"><p style="color:white">Prosjekt</p></div>
<div id="organizationMenu" class="menus"><p style="color:white">Organization</p></div>



<script type="text/javascript">
$(window).scroll(function(e) {

    // Get the position of the location where the scroller starts.
    var scroller_anchor = $(".menu_anchor").offset().top;
    var nav_height = $('.scroller').height();

    // Check if the user has scrolled and the current position is after the scroller start location and if its not already fixed at the top 
    if ($(this).scrollTop() >= scroller_anchor && $('.menus').css('position') != 'fixed') 
    {    // Change the CSS of the scroller to hilight it and fix it at the top of the screen.
        $('.menus').css({
            'position': 'fixed',
            'top': nav_height //49px
        });


    } 
    else if ($(this).scrollTop() < scroller_anchor && $('.menus').css('position') != 'relative') 
    {    // If the user has scrolled back to the location above the scroller anchor place it back into the content.

        // Change the height of the scroller anchor to 0 and now we will be adding the scroller back to the content.
        $('.menu_anchor').css('height', '0');

        // Puts header at its original position
        $('.menus').css({
            'position': 'relative',
            'top' : '0px'
        });
    }
});










var newsToggle = true;
var statsToggle = true;
var projectToggle = true;
var organizationToggle = true;


$('a[name=showNewsMenu]').on("click", function() {

  if(newsToggle) {

    $("#newsMenu").animate({'height': '50px'}, 0);


    hideProject();
    hideOrganization();
    hideStats();



} else {

    $("#newsMenu").animate({'height': '0'}, 800);
}
newsToggle = !newsToggle;
});


$('a[name=showStatsMenu]').on("click", function() {

  if(statsToggle) {

    $("#statsMenu").animate({'height': '50px'}, 0);


    hideNews();
    hideProject();
    hideOrganization();



} else {

    $("#statsMenu").animate({'height': '0'}, 800);
}
statsToggle = !statsToggle;
});


$('a[name=showProjectMenu]').on("click", function() {

  if(projectToggle) {

    $("#projectMenu").animate({'height': '50px'}, 0);

    hideNews();
    hideOrganization();
    hideStats();





} else {

    $("#projectMenu").animate({'height': '0'}, 800);
}
projectToggle = !projectToggle;
});


$('a[name=showOrganizationMenu]').on("click", function() {

  if(organizationToggle) {

    hideNews();
    hideStats();
    hideProject();

    $("#organizationMenu").animate({'height': '50px'}, 0);


    
    
    



} else {

    $("#organizationMenu").animate({'height': '0'}, 800);
}
organizationToggle = !organizationToggle;
});


function hideNews(){
    $("#newsMenu").animate({'height': '0'}, 0);
    newsToggle = true;
}

function hideStats(){
    $("#statsMenu").animate({'height': '0'}, 0);
    statsToggle = true;
}
function hideProject(){
    $("#projectMenu").animate({'height': '0'}, 0);
    projectToggle = true;
}
function hideOrganization(){
    $("#organizationMenu").animate({'height': '0'}, 0);
    organizationToggle = true;
}




</script>





