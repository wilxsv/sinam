<?php

/* SinamCoreBundle::template/head.html.twig */
class __TwigTemplate_76714761352eeda8d8e222cee0fa193f6eea397b8b3352378ef24101167834b8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_89f636e85cf09eb8b1280597fb4b0d8d001ce7da657295792b10da258cadf23b = $this->env->getExtension("native_profiler");
        $__internal_89f636e85cf09eb8b1280597fb4b0d8d001ce7da657295792b10da258cadf23b->enter($__internal_89f636e85cf09eb8b1280597fb4b0d8d001ce7da657295792b10da258cadf23b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SinamCoreBundle::template/head.html.twig"));

        // line 1
        echo "<!-- /.page-top -->
  <section id=\"top-contact\" class=\"top-contact\">
   <div class=\"container\">
    <div class=\"row\">
     <div class=\"col-sm-8 pull-left\">
      <ul class=\"contact-list\">
       <li>
        <a class=\"site-name\" href=\"#\">Inicio</a>
       </li>
       <li>
        <a class=\"site-name\" href=\"http://www.salud.gob.sv/\" target=\"_new\">Ministerio de Salud</a>
       </li>
       <li>
        <a class=\"site-name\" href=\"http://www.salud.gob.sv/category/novedades/noticias/ciudadanosas/\" target=\"_new\">Noticias</a>
       </li>
       <li>
        <a class=\"site-name\" href=\"http://www.salud.gob.sv/denuncias/\" target=\"_new\">Denuncias</a>
       </li>
      </ul>
     </div>
     <div class=\"col-sm-4 pull-right\">
      <div class=\"top-social\">
       <ul>
        <li>
         <a href=\"http://www.facebook.com/salud.sv\" class=\"top-icon fa fa-facebook\"></a>
        </li>
        <li>
         <a href=\"https://www.flickr.com/photos/minsal_sv/\" class=\"top-icon fa fa-flickr\"></a>
        </li>
        <li>
         <a href=\"http://twitter.com/minsalud\" class=\"top-icon fa fa-twitter\"></a>
        </li>
        <li>
         <a href=\"http://www.youtube.com/comunicacionesminsal\" class=\"top-icon fa fa-youtube\"></a>
        </li>
        <li>
         <a href=\"http://publica.gobiernoabierto.gob.sv/institutions/ministerio-de-salud\">
          <img src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/portal-transparencia.png"), "html", null, true);
        echo "\" alt=\"Site Logo\">
         </a>
        </li>
       </ul>
      </div>
     </div>
    </div><!-- /.row -->
   </div><!-- /.container -->
  </section><!-- /#top-contact -->
  
  <section id=\"site-banner\" class=\"site-banner text-center\">
   <div class=\"container\"><a href=\"\"><img src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/banner_web_wpminsal2015V2.png"), "html", null, true);
        echo "\" alt=\"\"></a><!--
    <div class=\"site-logo\"></div><!-- /.site-logo -->
   </div><!-- /.container -->
  </section><!-- /#site-banner -->
  
  <header id=\"main-menu\" class=\"main-menu\">
   <div class=\"container\">
    <div class=\"row\">
     <div class=\"col-sm-8\">
      <div class=\"navbar-header\">
       <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#menu\">
        <i class=\"fa fa-bars\"></i>
       </button>
       <div class=\"menu-logo\">
        <a href=\"./\"><img src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/banner_web_wpminsal2015V2.png"), "html", null, true);
        echo "\" alt=\"\"></a>
       </div><!-- /.menu-logo -->
      </div>
      <nav id=\"menu\" class=\"menu collapse navbar-collapse\">
       <ul id=\"headernavigation\" class=\"menu-list nav navbar-nav\">
        <li><a href=\"";
        // line 68
        echo $this->env->getExtension('routing')->getPath("sinam_core_homepage");
        echo "\">Inicio</a></li>
        <li><a href=\"";
        // line 69
        echo $this->env->getExtension('routing')->getPath("sinam_busqueda");
        echo "\">Busquedas</a></li>
        <li><a href=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("sinam_core_homepage");
        echo "\">Documentos</a></li>
        <li><a href=\"";
        // line 71
        echo $this->env->getExtension('routing')->getPath("sinam_core_homepage");
        echo "\">Estadistica</a></li>
        <li><a href=\"";
        // line 72
        echo $this->env->getExtension('routing')->getPath("sinam_core_homepage");
        echo "\">Ayuda</a></li>
        <li><a href=\"";
        // line 73
        echo $this->env->getExtension('routing')->getPath("sinam_core_homepage");
        echo "\">Contáctenos</a></li>
       </ul><!-- /.menu-list -->
      </nav><!-- /.menu-list -->
     </div>
     <div class=\"col-sm-4\">
      <div class=\"menu-search pull-right\">
       <form role=\"search\" class=\"search-form\" action=\"#\" method=\"get\">
        <input class=\"search-field\" type=\"text\" name=\"s\" id=\"s\" placeholder=\"Buscar Medicamento\" required>
        <button class=\"btn search-btn\" type=\"submit\"><i class=\"fa fa-search\"></i></button>
       </form><!-- /.search-form -->
      </div><!-- /.menu-search -->
     </div>
    </div><!-- /.row -->
   </div><!-- /.container -->
  </header><!-- /#main-menu -->
";
        
        $__internal_89f636e85cf09eb8b1280597fb4b0d8d001ce7da657295792b10da258cadf23b->leave($__internal_89f636e85cf09eb8b1280597fb4b0d8d001ce7da657295792b10da258cadf23b_prof);

    }

    public function getTemplateName()
    {
        return "SinamCoreBundle::template/head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 73,  116 => 72,  112 => 71,  108 => 70,  104 => 69,  100 => 68,  92 => 63,  75 => 49,  61 => 38,  22 => 1,);
    }
}
/* <!-- /.page-top -->*/
/*   <section id="top-contact" class="top-contact">*/
/*    <div class="container">*/
/*     <div class="row">*/
/*      <div class="col-sm-8 pull-left">*/
/*       <ul class="contact-list">*/
/*        <li>*/
/*         <a class="site-name" href="#">Inicio</a>*/
/*        </li>*/
/*        <li>*/
/*         <a class="site-name" href="http://www.salud.gob.sv/" target="_new">Ministerio de Salud</a>*/
/*        </li>*/
/*        <li>*/
/*         <a class="site-name" href="http://www.salud.gob.sv/category/novedades/noticias/ciudadanosas/" target="_new">Noticias</a>*/
/*        </li>*/
/*        <li>*/
/*         <a class="site-name" href="http://www.salud.gob.sv/denuncias/" target="_new">Denuncias</a>*/
/*        </li>*/
/*       </ul>*/
/*      </div>*/
/*      <div class="col-sm-4 pull-right">*/
/*       <div class="top-social">*/
/*        <ul>*/
/*         <li>*/
/*          <a href="http://www.facebook.com/salud.sv" class="top-icon fa fa-facebook"></a>*/
/*         </li>*/
/*         <li>*/
/*          <a href="https://www.flickr.com/photos/minsal_sv/" class="top-icon fa fa-flickr"></a>*/
/*         </li>*/
/*         <li>*/
/*          <a href="http://twitter.com/minsalud" class="top-icon fa fa-twitter"></a>*/
/*         </li>*/
/*         <li>*/
/*          <a href="http://www.youtube.com/comunicacionesminsal" class="top-icon fa fa-youtube"></a>*/
/*         </li>*/
/*         <li>*/
/*          <a href="http://publica.gobiernoabierto.gob.sv/institutions/ministerio-de-salud">*/
/*           <img src="{{ asset('images/portal-transparencia.png') }}" alt="Site Logo">*/
/*          </a>*/
/*         </li>*/
/*        </ul>*/
/*       </div>*/
/*      </div>*/
/*     </div><!-- /.row -->*/
/*    </div><!-- /.container -->*/
/*   </section><!-- /#top-contact -->*/
/*   */
/*   <section id="site-banner" class="site-banner text-center">*/
/*    <div class="container"><a href=""><img src="{{ asset('images/banner_web_wpminsal2015V2.png') }}" alt=""></a><!--*/
/*     <div class="site-logo"></div><!-- /.site-logo -->*/
/*    </div><!-- /.container -->*/
/*   </section><!-- /#site-banner -->*/
/*   */
/*   <header id="main-menu" class="main-menu">*/
/*    <div class="container">*/
/*     <div class="row">*/
/*      <div class="col-sm-8">*/
/*       <div class="navbar-header">*/
/*        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">*/
/*         <i class="fa fa-bars"></i>*/
/*        </button>*/
/*        <div class="menu-logo">*/
/*         <a href="./"><img src="{{ asset('images/banner_web_wpminsal2015V2.png') }}" alt=""></a>*/
/*        </div><!-- /.menu-logo -->*/
/*       </div>*/
/*       <nav id="menu" class="menu collapse navbar-collapse">*/
/*        <ul id="headernavigation" class="menu-list nav navbar-nav">*/
/*         <li><a href="{{ path( 'sinam_core_homepage' ) }}">Inicio</a></li>*/
/*         <li><a href="{{ path( 'sinam_busqueda' ) }}">Busquedas</a></li>*/
/*         <li><a href="{{ path( 'sinam_core_homepage' ) }}">Documentos</a></li>*/
/*         <li><a href="{{ path( 'sinam_core_homepage' ) }}">Estadistica</a></li>*/
/*         <li><a href="{{ path( 'sinam_core_homepage' ) }}">Ayuda</a></li>*/
/*         <li><a href="{{ path( 'sinam_core_homepage' ) }}">Contáctenos</a></li>*/
/*        </ul><!-- /.menu-list -->*/
/*       </nav><!-- /.menu-list -->*/
/*      </div>*/
/*      <div class="col-sm-4">*/
/*       <div class="menu-search pull-right">*/
/*        <form role="search" class="search-form" action="#" method="get">*/
/*         <input class="search-field" type="text" name="s" id="s" placeholder="Buscar Medicamento" required>*/
/*         <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>*/
/*        </form><!-- /.search-form -->*/
/*       </div><!-- /.menu-search -->*/
/*      </div>*/
/*     </div><!-- /.row -->*/
/*    </div><!-- /.container -->*/
/*   </header><!-- /#main-menu -->*/
/* */
