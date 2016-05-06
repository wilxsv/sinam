<?php

/* SinamCoreBundle:Default:index.html.twig */
class __TwigTemplate_18db1df4351b9e8f43c5b57e59068482f9740c9770b8985ebf60dd625dfb80a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("SinamCoreBundle::default.html.twig", "SinamCoreBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'js_head' => array($this, 'block_js_head'),
            'body_tag' => array($this, 'block_body_tag'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SinamCoreBundle::default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c31cb7497643a08283677d4e6ae1cdb343e41e186ad2b810450c244facd493a8 = $this->env->getExtension("native_profiler");
        $__internal_c31cb7497643a08283677d4e6ae1cdb343e41e186ad2b810450c244facd493a8->enter($__internal_c31cb7497643a08283677d4e6ae1cdb343e41e186ad2b810450c244facd493a8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SinamCoreBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c31cb7497643a08283677d4e6ae1cdb343e41e186ad2b810450c244facd493a8->leave($__internal_c31cb7497643a08283677d4e6ae1cdb343e41e186ad2b810450c244facd493a8_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_5d9d9c39dc7a5fa6d90560388ac7462d7ca693b7e2ca3088b2e2dc07bba93402 = $this->env->getExtension("native_profiler");
        $__internal_5d9d9c39dc7a5fa6d90560388ac7462d7ca693b7e2ca3088b2e2dc07bba93402->enter($__internal_5d9d9c39dc7a5fa6d90560388ac7462d7ca693b7e2ca3088b2e2dc07bba93402_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo " <div id=\"comments\" class=\"comments\">
  <div class=\"comments-area\">
   <h3 class=\"comment-title\">Busqueda básica</h3>
   <div id=\"respond\">
   </div>
   ";
        // line 8
        if (((isset($context["rest"]) ? $context["rest"] : $this->getContext($context, "rest")) == true)) {
            // line 9
            echo "    <h3 class=\"comment-title\">Resultado</h3>
    <div id=\"respond\">
     <table>
      <thead>
       <th>Nombre</th><th>Concentracion</th><th>Forma</th><th>Presentacion</th><th>Codigo UN</th><th>Establecimiento</th><th>Direccion</th><th>Distancia</th>
      </thead>
      <tbody>
       ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["rest"]) ? $context["rest"] : $this->getContext($context, "rest")));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 17
                echo "        <tr>
         <td>";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "nombre", array()), "html", null, true);
                echo "</td>
         <td>";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "concentracion", array()), "html", null, true);
                echo "</td>
         <td>";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Formafarmaceutica", array()), "html", null, true);
                echo "</td>
         <td>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Presentacion", array()), "html", null, true);
                echo "</td>
         <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Codigonacionesunidas", array()), "html", null, true);
                echo "</td>
         <td></td><th></td><td></td>
        </tr>
       ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "      </tbody>
     </table>
    </div>
   ";
        }
        // line 30
        echo "  </div>
 </div>
";
        
        $__internal_5d9d9c39dc7a5fa6d90560388ac7462d7ca693b7e2ca3088b2e2dc07bba93402->leave($__internal_5d9d9c39dc7a5fa6d90560388ac7462d7ca693b7e2ca3088b2e2dc07bba93402_prof);

    }

    // line 33
    public function block_js_head($context, array $blocks = array())
    {
        $__internal_cb3e865de09da1d4e181ca88b3d589a858608e053b8839e1fa106452086cc472 = $this->env->getExtension("native_profiler");
        $__internal_cb3e865de09da1d4e181ca88b3d589a858608e053b8839e1fa106452086cc472->enter($__internal_cb3e865de09da1d4e181ca88b3d589a858608e053b8839e1fa106452086cc472_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js_head"));

        
        $__internal_cb3e865de09da1d4e181ca88b3d589a858608e053b8839e1fa106452086cc472->leave($__internal_cb3e865de09da1d4e181ca88b3d589a858608e053b8839e1fa106452086cc472_prof);

    }

    // line 35
    public function block_body_tag($context, array $blocks = array())
    {
        $__internal_313436a2ae1ac0fba4209c504d4e3e39bf49ffeac95510ebaeafba94dd1ce855 = $this->env->getExtension("native_profiler");
        $__internal_313436a2ae1ac0fba4209c504d4e3e39bf49ffeac95510ebaeafba94dd1ce855->enter($__internal_313436a2ae1ac0fba4209c504d4e3e39bf49ffeac95510ebaeafba94dd1ce855_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_tag"));

        echo "onload=\"init()\"";
        
        $__internal_313436a2ae1ac0fba4209c504d4e3e39bf49ffeac95510ebaeafba94dd1ce855->leave($__internal_313436a2ae1ac0fba4209c504d4e3e39bf49ffeac95510ebaeafba94dd1ce855_prof);

    }

    public function getTemplateName()
    {
        return "SinamCoreBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 35,  108 => 33,  99 => 30,  93 => 26,  83 => 22,  79 => 21,  75 => 20,  71 => 19,  67 => 18,  64 => 17,  60 => 16,  51 => 9,  49 => 8,  42 => 3,  36 => 2,  11 => 1,);
    }
}
/* {% extends 'SinamCoreBundle::default.html.twig' %}*/
/* {% block body %}*/
/*  <div id="comments" class="comments">*/
/*   <div class="comments-area">*/
/*    <h3 class="comment-title">Busqueda básica</h3>*/
/*    <div id="respond">*/
/*    </div>*/
/*    {% if rest == true %}*/
/*     <h3 class="comment-title">Resultado</h3>*/
/*     <div id="respond">*/
/*      <table>*/
/*       <thead>*/
/*        <th>Nombre</th><th>Concentracion</th><th>Forma</th><th>Presentacion</th><th>Codigo UN</th><th>Establecimiento</th><th>Direccion</th><th>Distancia</th>*/
/*       </thead>*/
/*       <tbody>*/
/*        {% for item in rest %}*/
/*         <tr>*/
/*          <td>{{item.nombre}}</td>*/
/*          <td>{{item.concentracion}}</td>*/
/*          <td>{{item.Formafarmaceutica}}</td>*/
/*          <td>{{item.Presentacion}}</td>*/
/*          <td>{{item.Codigonacionesunidas}}</td>*/
/*          <td></td><th></td><td></td>*/
/*         </tr>*/
/*        {% endfor %}*/
/*       </tbody>*/
/*      </table>*/
/*     </div>*/
/*    {% endif %}*/
/*   </div>*/
/*  </div>*/
/* {% endblock %}*/
/* {% block js_head %}*/
/* {% endblock %}*/
/* {% block body_tag %}onload="init()"{% endblock %}*/
/* */
