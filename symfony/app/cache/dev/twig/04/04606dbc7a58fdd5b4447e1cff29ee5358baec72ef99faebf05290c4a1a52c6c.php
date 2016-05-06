<?php

/* SinamCoreBundle::default.html.twig */
class __TwigTemplate_86e87af87b9e444c06623ee5fb8a2f9221a9ededca6db2e336a0b26be4715771 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js_head' => array($this, 'block_js_head'),
            'body_tag' => array($this, 'block_body_tag'),
            'body' => array($this, 'block_body'),
            'lateral' => array($this, 'block_lateral'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_58f0df023b91035f21e39741c27e93c4f461bee3db25facdfceb9fd10361622f = $this->env->getExtension("native_profiler");
        $__internal_58f0df023b91035f21e39741c27e93c4f461bee3db25facdfceb9fd10361622f->enter($__internal_58f0df023b91035f21e39741c27e93c4f461bee3db25facdfceb9fd10361622f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SinamCoreBundle::default.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
 <head>
  <meta charset=\"UTF-8\">
  <title>:: ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo " | Sistema Nacional de Consulta Publica de Abastecimiento de Medicamentos  :: </title>
  <meta name=\"description\" content=\"Heera HTML5 Template by Jewel Theme\" >
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/css/animate.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/css/responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <!--[if IE]><script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script><![endif]-->
  ";
        // line 16
        $this->displayBlock('js_head', $context, $blocks);
        // line 17
        echo " </head>
 <body class=\"header-fixed-top\" ";
        // line 18
        $this->displayBlock('body_tag', $context, $blocks);
        echo ">
  <div id=\"page-top\" class=\"page-top\"></div>
  <!-- head -->
   ";
        // line 21
        $this->loadTemplate("SinamCoreBundle::template/head.html.twig", "SinamCoreBundle::default.html.twig", 21)->display($context);
        // line 22
        echo "  <!-- //head -->
  <section id=\"main-content\" class=\"main-content blog-post-singgle-page\">
   <div class=\"container\">
    <div class=\"row\">
     <div class=\"col-sm-8\">
      ";
        // line 27
        $this->displayBlock('body', $context, $blocks);
        // line 32
        echo "     </div>
     <div class=\"col-sm-4\">
      ";
        // line 34
        $this->displayBlock('lateral', $context, $blocks);
        // line 39
        echo "     </div>
    </div>
   </div>
  </section>
  <!-- footer -->
   ";
        // line 44
        $this->loadTemplate("SinamCoreBundle::template/footer.html.twig", "SinamCoreBundle::default.html.twig", 44)->display($context);
        // line 45
        echo "  <!-- //footer -->
  <script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/modernizr-2.8.3.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/jquery-2.1.0.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/plugins.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/functions.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/wow.min.js"), "html", null, true);
        echo "\"></script>
  ";
        // line 51
        $this->displayBlock('javascripts', $context, $blocks);
        // line 52
        echo " </body>
</html>
";
        
        $__internal_58f0df023b91035f21e39741c27e93c4f461bee3db25facdfceb9fd10361622f->leave($__internal_58f0df023b91035f21e39741c27e93c4f461bee3db25facdfceb9fd10361622f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_0404c4d731799353061f509635066735f55329b7429f1dee7b00f13ebc704e5a = $this->env->getExtension("native_profiler");
        $__internal_0404c4d731799353061f509635066735f55329b7429f1dee7b00f13ebc704e5a->enter($__internal_0404c4d731799353061f509635066735f55329b7429f1dee7b00f13ebc704e5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_0404c4d731799353061f509635066735f55329b7429f1dee7b00f13ebc704e5a->leave($__internal_0404c4d731799353061f509635066735f55329b7429f1dee7b00f13ebc704e5a_prof);

    }

    // line 16
    public function block_js_head($context, array $blocks = array())
    {
        $__internal_60d4572d787813f8e175121153c9fad210eda2c0dae1302dd323da45286efeb2 = $this->env->getExtension("native_profiler");
        $__internal_60d4572d787813f8e175121153c9fad210eda2c0dae1302dd323da45286efeb2->enter($__internal_60d4572d787813f8e175121153c9fad210eda2c0dae1302dd323da45286efeb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js_head"));

        
        $__internal_60d4572d787813f8e175121153c9fad210eda2c0dae1302dd323da45286efeb2->leave($__internal_60d4572d787813f8e175121153c9fad210eda2c0dae1302dd323da45286efeb2_prof);

    }

    // line 18
    public function block_body_tag($context, array $blocks = array())
    {
        $__internal_bbceb4d048f0a5efd8b0cc14f175e3198caf97f307654e741411ac2e9365c5a3 = $this->env->getExtension("native_profiler");
        $__internal_bbceb4d048f0a5efd8b0cc14f175e3198caf97f307654e741411ac2e9365c5a3->enter($__internal_bbceb4d048f0a5efd8b0cc14f175e3198caf97f307654e741411ac2e9365c5a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_tag"));

        
        $__internal_bbceb4d048f0a5efd8b0cc14f175e3198caf97f307654e741411ac2e9365c5a3->leave($__internal_bbceb4d048f0a5efd8b0cc14f175e3198caf97f307654e741411ac2e9365c5a3_prof);

    }

    // line 27
    public function block_body($context, array $blocks = array())
    {
        $__internal_ddcf4e2286fec5ad66fdf1339e6bccb49964626adec35bb904ec992575626ace = $this->env->getExtension("native_profiler");
        $__internal_ddcf4e2286fec5ad66fdf1339e6bccb49964626adec35bb904ec992575626ace->enter($__internal_ddcf4e2286fec5ad66fdf1339e6bccb49964626adec35bb904ec992575626ace_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 28
        echo "       <!-- lateral -->
        ";
        // line 29
        $this->loadTemplate("SinamCoreBundle::template/body.html.twig", "SinamCoreBundle::default.html.twig", 29)->display($context);
        // line 30
        echo "       <!-- //lateral -->
      ";
        
        $__internal_ddcf4e2286fec5ad66fdf1339e6bccb49964626adec35bb904ec992575626ace->leave($__internal_ddcf4e2286fec5ad66fdf1339e6bccb49964626adec35bb904ec992575626ace_prof);

    }

    // line 34
    public function block_lateral($context, array $blocks = array())
    {
        $__internal_3f46ae7ffd9392c3812c5a478a204bf4e9bbc28cda00bfab8a0ce2d0334cbd0a = $this->env->getExtension("native_profiler");
        $__internal_3f46ae7ffd9392c3812c5a478a204bf4e9bbc28cda00bfab8a0ce2d0334cbd0a->enter($__internal_3f46ae7ffd9392c3812c5a478a204bf4e9bbc28cda00bfab8a0ce2d0334cbd0a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "lateral"));

        // line 35
        echo "       <!-- lateral -->
        ";
        // line 36
        $this->loadTemplate("SinamCoreBundle::template/lateral.html.twig", "SinamCoreBundle::default.html.twig", 36)->display($context);
        // line 37
        echo "       <!-- //lateral -->
      ";
        
        $__internal_3f46ae7ffd9392c3812c5a478a204bf4e9bbc28cda00bfab8a0ce2d0334cbd0a->leave($__internal_3f46ae7ffd9392c3812c5a478a204bf4e9bbc28cda00bfab8a0ce2d0334cbd0a_prof);

    }

    // line 51
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4d999d9782141c16ffda3dfecacf42c26e9a6d760ae83b5e75fb5ea3ffb6a404 = $this->env->getExtension("native_profiler");
        $__internal_4d999d9782141c16ffda3dfecacf42c26e9a6d760ae83b5e75fb5ea3ffb6a404->enter($__internal_4d999d9782141c16ffda3dfecacf42c26e9a6d760ae83b5e75fb5ea3ffb6a404_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_4d999d9782141c16ffda3dfecacf42c26e9a6d760ae83b5e75fb5ea3ffb6a404->leave($__internal_4d999d9782141c16ffda3dfecacf42c26e9a6d760ae83b5e75fb5ea3ffb6a404_prof);

    }

    public function getTemplateName()
    {
        return "SinamCoreBundle::default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 51,  197 => 37,  195 => 36,  192 => 35,  186 => 34,  178 => 30,  176 => 29,  173 => 28,  167 => 27,  156 => 18,  145 => 16,  134 => 5,  125 => 52,  123 => 51,  119 => 50,  115 => 49,  111 => 48,  107 => 47,  103 => 46,  100 => 45,  98 => 44,  91 => 39,  89 => 34,  85 => 32,  83 => 27,  76 => 22,  74 => 21,  68 => 18,  65 => 17,  63 => 16,  58 => 14,  54 => 13,  50 => 12,  46 => 11,  42 => 10,  34 => 5,  28 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/*  <head>*/
/*   <meta charset="UTF-8">*/
/*   <title>:: {% block title %}{% endblock %} | Sistema Nacional de Consulta Publica de Abastecimiento de Medicamentos  :: </title>*/
/*   <meta name="description" content="Heera HTML5 Template by Jewel Theme" >*/
/*   <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*   <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*   <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->*/
/*   <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">*/
/*   <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">*/
/*   <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">*/
/*   <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">*/
/*   <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">*/
/*   <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->*/
/*   {% block js_head %}{% endblock %}*/
/*  </head>*/
/*  <body class="header-fixed-top" {% block body_tag %}{% endblock %}>*/
/*   <div id="page-top" class="page-top"></div>*/
/*   <!-- head -->*/
/*    {% include 'SinamCoreBundle::template/head.html.twig' %}*/
/*   <!-- //head -->*/
/*   <section id="main-content" class="main-content blog-post-singgle-page">*/
/*    <div class="container">*/
/*     <div class="row">*/
/*      <div class="col-sm-8">*/
/*       {% block body %}*/
/*        <!-- lateral -->*/
/*         {% include 'SinamCoreBundle::template/body.html.twig' %}*/
/*        <!-- //lateral -->*/
/*       {% endblock %}*/
/*      </div>*/
/*      <div class="col-sm-4">*/
/*       {% block lateral %}*/
/*        <!-- lateral -->*/
/*         {% include 'SinamCoreBundle::template/lateral.html.twig' %}*/
/*        <!-- //lateral -->*/
/*       {% endblock %}*/
/*      </div>*/
/*     </div>*/
/*    </div>*/
/*   </section>*/
/*   <!-- footer -->*/
/*    {% include 'SinamCoreBundle::template/footer.html.twig' %}*/
/*   <!-- //footer -->*/
/*   <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>*/
/*   <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>*/
/*   <script src="{{ asset('assets/js/plugins.js') }}"></script>*/
/*   <script src="{{ asset('assets/js/functions.js') }}"></script>*/
/*   <script src="{{ asset('assets/js/wow.min.js') }}"></script>*/
/*   {% block javascripts %}{% endblock %}*/
/*  </body>*/
/* </html>*/
/* */
