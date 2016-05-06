<?php

/* SinamCoreBundle:Default:resultado.html.twig */
class __TwigTemplate_fc41aaf9169cc454989b2407b1df59a0edf9c0be96356df6c691afe5ec71ebeb extends Twig_Template
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
        $__internal_675750c03ea5109ea8a063bd93c399d823fb333756b3bd730c51fa16cd61b6b5 = $this->env->getExtension("native_profiler");
        $__internal_675750c03ea5109ea8a063bd93c399d823fb333756b3bd730c51fa16cd61b6b5->enter($__internal_675750c03ea5109ea8a063bd93c399d823fb333756b3bd730c51fa16cd61b6b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SinamCoreBundle:Default:resultado.html.twig"));

        // line 1
        echo " <section id=\"services\" class=\"services\">
 <div id=\"comments\" class=\"comments\">
  <div class=\"comments-area\">
   ";
        // line 4
        if (((isset($context["rest"]) ? $context["rest"] : $this->getContext($context, "rest")) == true)) {
            // line 5
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["rest"]) ? $context["rest"] : $this->getContext($context, "rest")));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 6
                echo "     <div class=\"item\">
      <div class=\"row\">
      <p>
       <h3>";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "nombre", array()), "html", null, true);
                echo "</h3>
       Existencias: ";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "existencia", array()), "html", null, true);
                echo "<br />
       Forma: ";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "formafarmaceutica", array()), "html", null, true);
                echo "<br />
       Presentación: ";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "presentacion", array()), "html", null, true);
                echo "<br />
       Establecimiento: ";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "nombree", array()), "html", null, true);
                echo "<br />
       Direccion: ";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "direccion", array()), "html", null, true);
                echo "<br />
       <p align=\"right\">Descargar: <img src=\"";
                // line 15
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/odt.png"), "html", null, true);
                echo "\" height=\"34\" width=\"32\"> <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/ods.png"), "html", null, true);
                echo "\" height=\"34\" width=\"32\"> <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/pdf.png"), "html", null, true);
                echo "\" height=\"34\" width=\"32\"> </p>
      </p>
      </div>
     </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "   ";
        } else {
            echo "<div class=\"item\">
      <div class=\"row\">
      <p>
       <h3>No se encontraron existencias</h3>
      </p>
      </div>
     </div>
   ";
        }
        // line 28
        echo "   </div>
  </div>
 </section>
";
        
        $__internal_675750c03ea5109ea8a063bd93c399d823fb333756b3bd730c51fa16cd61b6b5->leave($__internal_675750c03ea5109ea8a063bd93c399d823fb333756b3bd730c51fa16cd61b6b5_prof);

    }

    public function getTemplateName()
    {
        return "SinamCoreBundle:Default:resultado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 28,  78 => 20,  63 => 15,  59 => 14,  55 => 13,  51 => 12,  47 => 11,  43 => 10,  39 => 9,  34 => 6,  29 => 5,  27 => 4,  22 => 1,);
    }
}
/*  <section id="services" class="services">*/
/*  <div id="comments" class="comments">*/
/*   <div class="comments-area">*/
/*    {% if rest == true %}*/
/*     {% for item in rest %}*/
/*      <div class="item">*/
/*       <div class="row">*/
/*       <p>*/
/*        <h3>{{item.nombre}}</h3>*/
/*        Existencias: {{item.existencia}}<br />*/
/*        Forma: {{item.formafarmaceutica}}<br />*/
/*        Presentación: {{item.presentacion}}<br />*/
/*        Establecimiento: {{item.nombree}}<br />*/
/*        Direccion: {{item.direccion}}<br />*/
/*        <p align="right">Descargar: <img src="{{ asset('images/odt.png') }}" height="34" width="32"> <img src="{{ asset('images/ods.png') }}" height="34" width="32"> <img src="{{ asset('images/pdf.png') }}" height="34" width="32"> </p>*/
/*       </p>*/
/*       </div>*/
/*      </div>*/
/*     {% endfor %}*/
/*    {% else %}<div class="item">*/
/*       <div class="row">*/
/*       <p>*/
/*        <h3>No se encontraron existencias</h3>*/
/*       </p>*/
/*       </div>*/
/*      </div>*/
/*    {% endif %}*/
/*    </div>*/
/*   </div>*/
/*  </section>*/
/* */
