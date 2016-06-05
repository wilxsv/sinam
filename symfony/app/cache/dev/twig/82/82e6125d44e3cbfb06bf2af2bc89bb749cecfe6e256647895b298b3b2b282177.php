<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_ed2ef74d895e98de97b2d82f4ad389116ed7bf8c47ae804a9182e22c121e478a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f0bbc0619c4303bf0032d03e3e4033fb586312fb95e372147d396fdd2682ea67 = $this->env->getExtension("native_profiler");
        $__internal_f0bbc0619c4303bf0032d03e3e4033fb586312fb95e372147d396fdd2682ea67->enter($__internal_f0bbc0619c4303bf0032d03e3e4033fb586312fb95e372147d396fdd2682ea67_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f0bbc0619c4303bf0032d03e3e4033fb586312fb95e372147d396fdd2682ea67->leave($__internal_f0bbc0619c4303bf0032d03e3e4033fb586312fb95e372147d396fdd2682ea67_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_2b1a8faef258f79f7d0407fed57c7a923a47000c6a55d591f9ef99c3865b5c1c = $this->env->getExtension("native_profiler");
        $__internal_2b1a8faef258f79f7d0407fed57c7a923a47000c6a55d591f9ef99c3865b5c1c->enter($__internal_2b1a8faef258f79f7d0407fed57c7a923a47000c6a55d591f9ef99c3865b5c1c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_2b1a8faef258f79f7d0407fed57c7a923a47000c6a55d591f9ef99c3865b5c1c->leave($__internal_2b1a8faef258f79f7d0407fed57c7a923a47000c6a55d591f9ef99c3865b5c1c_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_2ff588aafceaa38a01a1581df15b71a7a5cd8c83e7277b320e581e384b6350f2 = $this->env->getExtension("native_profiler");
        $__internal_2ff588aafceaa38a01a1581df15b71a7a5cd8c83e7277b320e581e384b6350f2->enter($__internal_2ff588aafceaa38a01a1581df15b71a7a5cd8c83e7277b320e581e384b6350f2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_2ff588aafceaa38a01a1581df15b71a7a5cd8c83e7277b320e581e384b6350f2->leave($__internal_2ff588aafceaa38a01a1581df15b71a7a5cd8c83e7277b320e581e384b6350f2_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_b061df8de66744ab6dba28b5dfeb9bf41f582c8adcbfc96cd6280f535ea19852 = $this->env->getExtension("native_profiler");
        $__internal_b061df8de66744ab6dba28b5dfeb9bf41f582c8adcbfc96cd6280f535ea19852->enter($__internal_b061df8de66744ab6dba28b5dfeb9bf41f582c8adcbfc96cd6280f535ea19852_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_b061df8de66744ab6dba28b5dfeb9bf41f582c8adcbfc96cd6280f535ea19852->leave($__internal_b061df8de66744ab6dba28b5dfeb9bf41f582c8adcbfc96cd6280f535ea19852_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
