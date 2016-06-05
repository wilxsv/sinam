<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_15b0ed0e8e4b487aa3012dec565311977ae57b0f0d51734439877cc37b2ec78a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_950e7a14364fa373ab3aabc1fff16e7bba40e5285ce1731e62de551b50f8d8e4 = $this->env->getExtension("native_profiler");
        $__internal_950e7a14364fa373ab3aabc1fff16e7bba40e5285ce1731e62de551b50f8d8e4->enter($__internal_950e7a14364fa373ab3aabc1fff16e7bba40e5285ce1731e62de551b50f8d8e4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_950e7a14364fa373ab3aabc1fff16e7bba40e5285ce1731e62de551b50f8d8e4->leave($__internal_950e7a14364fa373ab3aabc1fff16e7bba40e5285ce1731e62de551b50f8d8e4_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_fc5ee2115a87e441cd11b72bc4ada94671e490a762c5754bc65bad8f3177f114 = $this->env->getExtension("native_profiler");
        $__internal_fc5ee2115a87e441cd11b72bc4ada94671e490a762c5754bc65bad8f3177f114->enter($__internal_fc5ee2115a87e441cd11b72bc4ada94671e490a762c5754bc65bad8f3177f114_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_fc5ee2115a87e441cd11b72bc4ada94671e490a762c5754bc65bad8f3177f114->leave($__internal_fc5ee2115a87e441cd11b72bc4ada94671e490a762c5754bc65bad8f3177f114_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_365067214e08d33fd1219a7bd30cbac81f32c4bbe3a2fa7c48a349968f7c5bff = $this->env->getExtension("native_profiler");
        $__internal_365067214e08d33fd1219a7bd30cbac81f32c4bbe3a2fa7c48a349968f7c5bff->enter($__internal_365067214e08d33fd1219a7bd30cbac81f32c4bbe3a2fa7c48a349968f7c5bff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_365067214e08d33fd1219a7bd30cbac81f32c4bbe3a2fa7c48a349968f7c5bff->leave($__internal_365067214e08d33fd1219a7bd30cbac81f32c4bbe3a2fa7c48a349968f7c5bff_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_8d605d5fb617ba4bd2a11cb45f8e006a67e67881fc6ff20af566bf5507c690f7 = $this->env->getExtension("native_profiler");
        $__internal_8d605d5fb617ba4bd2a11cb45f8e006a67e67881fc6ff20af566bf5507c690f7->enter($__internal_8d605d5fb617ba4bd2a11cb45f8e006a67e67881fc6ff20af566bf5507c690f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_8d605d5fb617ba4bd2a11cb45f8e006a67e67881fc6ff20af566bf5507c690f7->leave($__internal_8d605d5fb617ba4bd2a11cb45f8e006a67e67881fc6ff20af566bf5507c690f7_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
