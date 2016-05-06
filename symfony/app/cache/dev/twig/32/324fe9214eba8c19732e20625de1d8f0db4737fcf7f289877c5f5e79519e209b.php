<?php

/* SinamCoreBundle:Default:search.html.twig */
class __TwigTemplate_f43061113f43ff10e11a5b8d2a0299dc8c125dd4926dd211d52c94d404c00037 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("SinamCoreBundle::default.html.twig", "SinamCoreBundle:Default:search.html.twig", 1);
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
        $__internal_b1ceedf6cc927fb2f09fd83823db87f910cde75e1d94cedd3f14748828de4808 = $this->env->getExtension("native_profiler");
        $__internal_b1ceedf6cc927fb2f09fd83823db87f910cde75e1d94cedd3f14748828de4808->enter($__internal_b1ceedf6cc927fb2f09fd83823db87f910cde75e1d94cedd3f14748828de4808_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SinamCoreBundle:Default:search.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b1ceedf6cc927fb2f09fd83823db87f910cde75e1d94cedd3f14748828de4808->leave($__internal_b1ceedf6cc927fb2f09fd83823db87f910cde75e1d94cedd3f14748828de4808_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_6221084606eff6cae18f4babb569646583e7eee85bb1d5e20c810070b367bf67 = $this->env->getExtension("native_profiler");
        $__internal_6221084606eff6cae18f4babb569646583e7eee85bb1d5e20c810070b367bf67->enter($__internal_6221084606eff6cae18f4babb569646583e7eee85bb1d5e20c810070b367bf67_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "          <div class=\"service-accordion\">
           <div class=\"accordion\">
            <div aria-multiselectable=\"true\" role=\"tablist\" id=\"accordion\" class=\"panel-group\">
              <div class=\"panel panel-default\">
                <div id=\"headingOne\" role=\"tab\" class=\"panel-heading\">
                  <h4 class=\"panel-title\">
                    <a aria-controls=\"collapseOne\" aria-expanded=\"true\" href=\"#collapseOne\" data-parent=\"#accordion\" data-toggle=\"collapse\">
                      Busqueda por establecimiento
                    </a>
                  </h4>
                </div>
                <div aria-labelledby=\"headingOne\" role=\"tabpanel\" class=\"panel-collapse collapse in\" id=\"collapseOne\" aria-expanded=\"true\">
                  <div class=\"panel-body\">
                    <span class=\"service-image\"><img alt=\"\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/hospital.png"), "html", null, true);
        echo "\"></span>
                    <p>
                     <div id=\"respond\">
                      <form class=\"commentform\" method=\"post\">
                      ";
        // line 20
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("action" => "", "attr" => array("class" => "")));
        echo "
                        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'widget');
        echo "<br />
                        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "departamento", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "departamento", array()), 'widget');
        echo "<br />
                        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "municipio", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "municipio", array()), 'widget');
        echo "<br />
                        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "establecimiento", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "establecimiento", array()), 'widget');
        echo "
                        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "save", array()), 'widget');
        echo "
                        <button class=\"btn search-btn\" type=\"submit\" id=\"establecimiento_type_save\"><i class=\"fa fa-search\"></i></button>
                        ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'stylesheet');
        echo "
                        ";
        // line 28
        echo $this->env->getExtension('genemu.twig.extension.form')->renderJavascript((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        echo "
                      </form>
                     </div>
                    </p>
                  </div>
                </div>
              </div>
              <!-- -------------------------------------------------------------------------------------------------------------------------------- -->
              <div class=\"panel panel-default\">
                <div id=\"headingTwo\" role=\"tab\" class=\"panel-heading\">
                  <h4 class=\"panel-title\">
                    <a aria-controls=\"collapseTwo\" aria-expanded=\"false\" href=\"#collapseTwo\" data-parent=\"#accordion\" data-toggle=\"collapse\" class=\"collapsed\">
                      Busqueda por localidad
                    </a>
                  </h4>
                </div>
                <div aria-labelledby=\"headingTwo\" role=\"tabpanel\" class=\"panel-collapse collapse\" id=\"collapseTwo\" aria-expanded=\"false\">
                  <div class=\"panel-body\">
                   <span class=\"service-image\"><img alt=\"Service Image\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/mapa.png"), "html", null, true);
        echo "\"></span>
                   <p>
                    <div id=\"respond\">
                     <form class=\"commentform\" method=\"post\">
                     ";
        // line 50
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), 'form_start', array("action" => "", "attr" => array("class" => "")));
        echo "
                      ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "nombre", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "nombre", array()), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "nombre", array()), 'widget');
        echo "<br />
                      Seleccione un lugar cercano donde buscara sus medicamentos:<br/>
                      <div id=\"Map\" style=\"width: 700px; height: 300px;\"></div><div id=\"coords\"></div><br />
                      lon:";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "longitud", array()), 'widget');
        echo " lat:";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "latitud", array()), 'widget');
        echo "
                      ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "save", array()), 'widget');
        echo "
                     </form>
                    </div>
                   </p>
                  </div>
                </div>
              </div>
              <!-- -------------------------------------------------------------------------------------------------------------------------------- -->
              <div class=\"panel panel-default\">
                <div id=\"headingThree\" role=\"tab\" class=\"panel-heading\">
                  <h4 class=\"panel-title\">
                    <a aria-controls=\"collapseThree\" aria-expanded=\"false\" href=\"#collapseThree\" data-parent=\"#accordion\" data-toggle=\"collapse\" class=\"collapsed\">
                      Busqueda avanzada
                    </a>
                  </h4>
                </div>
                <div aria-labelledby=\"headingThree\" role=\"tabpanel\" class=\"panel-collapse collapse\" id=\"collapseThree\" aria-expanded=\"false\" style=\"height: 0px;\">
                  <div class=\"panel-body\">
                    <span class=\"service-image\"><img alt=\"Service Image\" src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/barras.png"), "html", null, true);
        echo "\"></span>
                    <p>
                     <form class=\"commentform\" method=\"post\">
                     ";
        // line 76
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), 'form_start', array("action" => "", "attr" => array("class" => "")));
        echo "
                        ";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "nombre", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "nombre", array()), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "nombre", array()), 'widget');
        echo "<br />
                        Presentacion<select name=\"historial_type[presentacion]\" id=\"historial_type_presentacion\">
                         ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["select"]) ? $context["select"] : $this->getContext($context, "select")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 80
            echo "                           <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "presentacion", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "presentacion", array()), "html", null, true);
            echo "</option>
                         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                        </select><br />
                        ";
        // line 83
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "unidad", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "unidad", array()), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "unidad", array()), 'widget');
        echo "<br />
                        ";
        // line 84
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "concentracion", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "concentracion", array()), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "concentracion", array()), 'widget');
        echo "<br />
                        ";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "almacen", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "almacen", array()), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "almacen", array()), 'widget');
        echo "<br />
                        ";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "periodo", array()), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "periodo", array()), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "periodo", array()), 'widget');
        echo "<br />
                        ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form3"]) ? $context["form3"] : $this->getContext($context, "form3")), "save", array()), 'widget');
        echo "<br />
                      </form>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.accordion -->

        </div><!-- /.service-accordion -->
        <div  id=\"resultado\" ></div>
        
        
<script src=\"http://code.jquery.com/jquery-1.11.0.min.js\"></script>
<script src=\"http://code.jquery.com/jquery-migrate-1.2.1.min.js\"></script>
<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$('#establecimiento_type_departamento').change(function(){
           var val = \$(this).val();
           \$.ajax({
                type: \"POST\",
                url: \"";
        // line 108
        echo $this->env->getExtension('routing')->getUrl("ajax_busqueda");
        echo "?depto_id=\" + val,
                success: function(data) {
                    // Remove current options
                    \$('#establecimiento_type_municipio').html('');
                    \$.each(data, function(k, v) {
                        \$('#establecimiento_type_municipio').append('<option value=\"' + v + '\">' + k + '</option>');
                    });
                }
            });
            return false;
        });
        \$('#establecimiento_type_municipio').change(function(){
           var val = \$(this).val();
           \$.ajax({
                type: \"POST\",
                url: \"";
        // line 123
        echo $this->env->getExtension('routing')->getUrl("ajax_busqueda");
        echo "?munic_id=\" + val,
                success: function(data) {
                    // Remove current options
                    \$('#establecimiento_type_establecimiento').html('');
                    \$.each(data, function(k, v) {
                        \$('#establecimiento_type_establecimiento').append('<option value=\"' + v + '\">' + k + '</option>');
                    });
                }
            });
            return false;
        });
        \$('#establecimiento_type_save').click(function(){
           var val = \$('#establecimiento_type_establecimiento').val(), nombre = \$('#establecimiento_type_nombre').val();
           \$.ajax({
                type: \"POST\",
                url: \"";
        // line 138
        echo $this->env->getExtension('routing')->getUrl("ajax_busqueda");
        echo "?establecimiento=\" + val + \"&nombre=\" + nombre,
                success: function(data) {
                    // Remove current options
                    \$('#resultado').html(data);
                }
            });
            return false;
        });
        \$('#mapa_type_save').click(function(){
           var nombre = \$('#mapa_type_nombre').val();
           \$.ajax({
                type: \"POST\",
                url: \"";
        // line 150
        echo $this->env->getExtension('routing')->getUrl("ajax_busqueda");
        echo "?lat=\" + \$('#mapa_type_latitud').val() + \"&lon=\" + \$('#mapa_type_longitud').val() + \"&nombre=\" + nombre,
                success: function(data) {
                    // Remove current options
                    \$('#resultado').html(data);
                }
            });
            return false;
        });
    });
</script>
";
        
        $__internal_6221084606eff6cae18f4babb569646583e7eee85bb1d5e20c810070b367bf67->leave($__internal_6221084606eff6cae18f4babb569646583e7eee85bb1d5e20c810070b367bf67_prof);

    }

    // line 161
    public function block_js_head($context, array $blocks = array())
    {
        $__internal_5c2a9eedcaeb5946c5a247ba927ba2a0dd05e60171c37c966f9ac7af95530fdb = $this->env->getExtension("native_profiler");
        $__internal_5c2a9eedcaeb5946c5a247ba927ba2a0dd05e60171c37c966f9ac7af95530fdb->enter($__internal_5c2a9eedcaeb5946c5a247ba927ba2a0dd05e60171c37c966f9ac7af95530fdb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js_head"));

        // line 162
        echo " <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/OpenLayers-2.13.1/OpenLayers.js"), "html", null, true);
        echo "\"></script>

                       <script>
                        var map;
        var centerWGS84, centerOSM;
        var projWGS84, projSphericalMercator;
        var osmLayer;
        
        function init(){

        \tprojWGS84 = new OpenLayers.Projection(\"EPSG:4326\");
\t\t\tprojSphericalMercator = new OpenLayers.Projection(\"EPSG:900913\");  
\t\t\t
\t\t\tcenterWGS84=new OpenLayers.LonLat(-89.218846,13.697911);
\t\t\tcenterOSM = transformToSphericalMercator(centerWGS84);

\t\t\tmap = new OpenLayers.Map(\"Map\");
\t\t\t
\t\t\tvar ctrl = new OpenLayers.Control.MousePosition()
\t\t\tctrl.formatOutput = transformMouseCoords; 
\t\t\tmap.addControl(ctrl);

        \tosmLayer = new OpenLayers.Layer.OSM();

        \tmap.addLayer(osmLayer);
        \tmap.setCenter(centerOSM, 9);            
            map.events.register(\"mousemove\", map, mouseMoveHandler);
            
            var click = new OpenLayers.Control.Click();
            map.addControl(click);
            click.activate();
        }
        function mouseMoveHandler(e) {
        \tvar position = this.events.getMousePosition(e);
        \tvar lonlat = map.getLonLatFromPixel(position);
        \tlonlat = transformMouseCoords(lonlat);\t\t\t\t\t
        }
        function transformMouseCoords(lonlat) {
        \tvar newlonlat=transformToWGS84(lonlat);
\t\t\tvar x = Math.round(newlonlat.lon*10000)/10000;
\t\t\tvar y = Math.round(newlonlat.lat*10000)/10000;
\t\t\tnewlonlat = new OpenLayers.LonLat(x,y);
\t\t\treturn newlonlat;
        }
        function transformToWGS84( sphMercatorCoords) {
        \t// Transforma desde SphericalMercator a WGS84
        \t// Devuelve un OpenLayers.LonLat con el pto transformado
        \tvar clon = sphMercatorCoords.clone(); // Si no uso un clon me transforma el punto original
        \tvar pointWGS84= clon.transform(
                    new OpenLayers.Projection(\"EPSG:900913\"), // to Spherical Mercator Projection;
        \t\t\tnew OpenLayers.Projection(\"EPSG:4326\")); // transform from WGS 1984
        \treturn pointWGS84;
        }
        function transformToSphericalMercator( wgs84LonLat) {
        \t// Transforma desde SphericalMercator a WGS84
        \t// Devuelve un OpenLayers.LonLat con el pto transformado
        \tvar clon = wgs84LonLat.clone(); // Si no uso un clon me transforma el punto original
        \tvar pointSphMerc= clon.transform(
                    new OpenLayers.Projection(\"EPSG:4326\"), // transform from WGS 1984
                    new OpenLayers.Projection(\"EPSG:900913\")); // to Spherical Mercator Projection;
        \treturn pointSphMerc;
        }
        OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                
            defaultHandlerOptions: {
                'single': true,
                'double': false,
                'pixelTolerance': 0,
                'stopSingle': false,
                'stopDouble': false
            },

            initialize: function(options) {
                this.handlerOptions = OpenLayers.Util.extend(
                    {}, this.defaultHandlerOptions
                );
                OpenLayers.Control.prototype.initialize.apply(
                    this, arguments
                ); 
                this.handler = new OpenLayers.Handler.Click(
                    this, {
                        'click': this.trigger
                    }, this.handlerOptions
                );
            }, 
            trigger: function(e) {
                var lonlat = map.getLonLatFromPixel(e.xy);
                lonlat = transformMouseCoords(lonlat);
        \t    document.getElementById(\"mapa_type_latitud\").value = lonlat.lat;
\t\t\t    document.getElementById(\"mapa_type_longitud\").value = lonlat.lon
            }
        });
  </script>
  <link rel=\"stylesheet\" href=\"";
        // line 254
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/daterangepicker/daterangepicker.css"), "html", null, true);
        echo "\" />
  <script src=\"";
        // line 255
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/daterangepicker/jquery-1.11.2.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 256
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/daterangepicker/moment.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 257
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/daterangepicker/jquery.daterangepicker.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 258
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/daterangepicker/demo.js"), "html", null, true);
        echo "\"></script>
\t\t<style>
\t\t.demo { margin:30px 0;}
\t\t.date-picker-wrapper .month-wrapper table .day.lalala { background-color:orange; }
\t\t.options { display:none; border-left:6px solid #8ae; padding:10px; font-size:12px; line-height:1.4; background-color:#eee; border-radius:4px;}
\t\t.date-picker-wrapper.date-range-picker19 .day.first-date-selected { background-color: red !important; }
\t\t.date-picker-wrapper.date-range-picker19 .day.last-date-selected { background-color: orange !important; }
\t\t</style>
";
        
        $__internal_5c2a9eedcaeb5946c5a247ba927ba2a0dd05e60171c37c966f9ac7af95530fdb->leave($__internal_5c2a9eedcaeb5946c5a247ba927ba2a0dd05e60171c37c966f9ac7af95530fdb_prof);

    }

    // line 267
    public function block_body_tag($context, array $blocks = array())
    {
        $__internal_6822b53912581232472ddcdcea6b003c6a24683ad693b58d65ca03252d5c2d87 = $this->env->getExtension("native_profiler");
        $__internal_6822b53912581232472ddcdcea6b003c6a24683ad693b58d65ca03252d5c2d87->enter($__internal_6822b53912581232472ddcdcea6b003c6a24683ad693b58d65ca03252d5c2d87_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_tag"));

        echo "onload=\"init()\"";
        
        $__internal_6822b53912581232472ddcdcea6b003c6a24683ad693b58d65ca03252d5c2d87->leave($__internal_6822b53912581232472ddcdcea6b003c6a24683ad693b58d65ca03252d5c2d87_prof);

    }

    public function getTemplateName()
    {
        return "SinamCoreBundle:Default:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  451 => 267,  435 => 258,  431 => 257,  427 => 256,  423 => 255,  419 => 254,  323 => 162,  317 => 161,  299 => 150,  284 => 138,  266 => 123,  248 => 108,  224 => 87,  218 => 86,  212 => 85,  206 => 84,  200 => 83,  197 => 82,  186 => 80,  182 => 79,  175 => 77,  171 => 76,  165 => 73,  144 => 55,  138 => 54,  130 => 51,  126 => 50,  119 => 46,  98 => 28,  94 => 27,  89 => 25,  84 => 24,  79 => 23,  74 => 22,  68 => 21,  64 => 20,  57 => 16,  42 => 3,  36 => 2,  11 => 1,);
    }
}
/* {% extends 'SinamCoreBundle::default.html.twig' %}*/
/* {% block body %}*/
/*           <div class="service-accordion">*/
/*            <div class="accordion">*/
/*             <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">*/
/*               <div class="panel panel-default">*/
/*                 <div id="headingOne" role="tab" class="panel-heading">*/
/*                   <h4 class="panel-title">*/
/*                     <a aria-controls="collapseOne" aria-expanded="true" href="#collapseOne" data-parent="#accordion" data-toggle="collapse">*/
/*                       Busqueda por establecimiento*/
/*                     </a>*/
/*                   </h4>*/
/*                 </div>*/
/*                 <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse in" id="collapseOne" aria-expanded="true">*/
/*                   <div class="panel-body">*/
/*                     <span class="service-image"><img alt="" src="{{ asset('images/hospital.png') }}"></span>*/
/*                     <p>*/
/*                      <div id="respond">*/
/*                       <form class="commentform" method="post">*/
/*                       {{ form_start(form, {'action': '', 'attr': {'class': ''}}) }}*/
/*                         {{ form_label(form.nombre) }}{{ form_errors(form.nombre) }}{{ form_widget(form.nombre) }}<br />*/
/*                         {{ form_label(form.departamento) }}{{ form_widget(form.departamento) }}<br />*/
/*                         {{ form_label(form.municipio) }}{{ form_widget(form.municipio) }}<br />*/
/*                         {{ form_label(form.establecimiento) }}{{ form_widget(form.establecimiento) }}*/
/*                         {{ form_widget(form.save) }}*/
/*                         <button class="btn search-btn" type="submit" id="establecimiento_type_save"><i class="fa fa-search"></i></button>*/
/*                         {{ form_stylesheet(form) }}*/
/*                         {{ form_javascript(form) }}*/
/*                       </form>*/
/*                      </div>*/
/*                     </p>*/
/*                   </div>*/
/*                 </div>*/
/*               </div>*/
/*               <!-- -------------------------------------------------------------------------------------------------------------------------------- -->*/
/*               <div class="panel panel-default">*/
/*                 <div id="headingTwo" role="tab" class="panel-heading">*/
/*                   <h4 class="panel-title">*/
/*                     <a aria-controls="collapseTwo" aria-expanded="false" href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="collapsed">*/
/*                       Busqueda por localidad*/
/*                     </a>*/
/*                   </h4>*/
/*                 </div>*/
/*                 <div aria-labelledby="headingTwo" role="tabpanel" class="panel-collapse collapse" id="collapseTwo" aria-expanded="false">*/
/*                   <div class="panel-body">*/
/*                    <span class="service-image"><img alt="Service Image" src="{{ asset('images/mapa.png') }}"></span>*/
/*                    <p>*/
/*                     <div id="respond">*/
/*                      <form class="commentform" method="post">*/
/*                      {{ form_start(form2, {'action': '', 'attr': {'class': ''}}) }}*/
/*                       {{ form_label(form2.nombre) }}{{ form_errors(form2.nombre) }}{{ form_widget(form2.nombre) }}<br />*/
/*                       Seleccione un lugar cercano donde buscara sus medicamentos:<br/>*/
/*                       <div id="Map" style="width: 700px; height: 300px;"></div><div id="coords"></div><br />*/
/*                       lon:{{ form_widget(form2.longitud) }} lat:{{ form_widget(form2.latitud) }}*/
/*                       {{ form_widget(form2.save) }}*/
/*                      </form>*/
/*                     </div>*/
/*                    </p>*/
/*                   </div>*/
/*                 </div>*/
/*               </div>*/
/*               <!-- -------------------------------------------------------------------------------------------------------------------------------- -->*/
/*               <div class="panel panel-default">*/
/*                 <div id="headingThree" role="tab" class="panel-heading">*/
/*                   <h4 class="panel-title">*/
/*                     <a aria-controls="collapseThree" aria-expanded="false" href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="collapsed">*/
/*                       Busqueda avanzada*/
/*                     </a>*/
/*                   </h4>*/
/*                 </div>*/
/*                 <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseThree" aria-expanded="false" style="height: 0px;">*/
/*                   <div class="panel-body">*/
/*                     <span class="service-image"><img alt="Service Image" src="{{ asset('images/barras.png') }}"></span>*/
/*                     <p>*/
/*                      <form class="commentform" method="post">*/
/*                      {{ form_start(form3, {'action': '', 'attr': {'class': ''}}) }}*/
/*                         {{ form_label(form3.nombre) }}{{ form_errors(form3.nombre) }}{{ form_widget(form3.nombre) }}<br />*/
/*                         Presentacion<select name="historial_type[presentacion]" id="historial_type_presentacion">*/
/*                          {% for item in select %}*/
/*                            <option value="{{item.presentacion}}">{{item.presentacion}}</option>*/
/*                          {% endfor %}*/
/*                         </select><br />*/
/*                         {{ form_label(form3.unidad) }}{{ form_errors(form3.unidad) }}{{ form_widget(form3.unidad) }}<br />*/
/*                         {{ form_label(form3.concentracion) }}{{ form_errors(form3.concentracion) }}{{ form_widget(form3.concentracion) }}<br />*/
/*                         {{ form_label(form3.almacen) }}{{ form_errors(form3.almacen) }}{{ form_widget(form3.almacen) }}<br />*/
/*                         {{ form_label(form3.periodo) }}{{ form_errors(form3.periodo) }}{{ form_widget(form3.periodo) }}<br />*/
/*                         {{ form_widget(form3.save) }}<br />*/
/*                       </form>*/
/*                     </p>*/
/*                   </div>*/
/*                 </div>*/
/*               </div>*/
/*             </div>*/
/*           </div><!-- /.accordion -->*/
/* */
/*         </div><!-- /.service-accordion -->*/
/*         <div  id="resultado" ></div>*/
/*         */
/*         */
/* <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>*/
/* <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>*/
/* <script type="text/javascript">*/
/*     $(document).ready(function () {*/
/*         $('#establecimiento_type_departamento').change(function(){*/
/*            var val = $(this).val();*/
/*            $.ajax({*/
/*                 type: "POST",*/
/*                 url: "{{ url('ajax_busqueda') }}?depto_id=" + val,*/
/*                 success: function(data) {*/
/*                     // Remove current options*/
/*                     $('#establecimiento_type_municipio').html('');*/
/*                     $.each(data, function(k, v) {*/
/*                         $('#establecimiento_type_municipio').append('<option value="' + v + '">' + k + '</option>');*/
/*                     });*/
/*                 }*/
/*             });*/
/*             return false;*/
/*         });*/
/*         $('#establecimiento_type_municipio').change(function(){*/
/*            var val = $(this).val();*/
/*            $.ajax({*/
/*                 type: "POST",*/
/*                 url: "{{ url('ajax_busqueda') }}?munic_id=" + val,*/
/*                 success: function(data) {*/
/*                     // Remove current options*/
/*                     $('#establecimiento_type_establecimiento').html('');*/
/*                     $.each(data, function(k, v) {*/
/*                         $('#establecimiento_type_establecimiento').append('<option value="' + v + '">' + k + '</option>');*/
/*                     });*/
/*                 }*/
/*             });*/
/*             return false;*/
/*         });*/
/*         $('#establecimiento_type_save').click(function(){*/
/*            var val = $('#establecimiento_type_establecimiento').val(), nombre = $('#establecimiento_type_nombre').val();*/
/*            $.ajax({*/
/*                 type: "POST",*/
/*                 url: "{{ url('ajax_busqueda') }}?establecimiento=" + val + "&nombre=" + nombre,*/
/*                 success: function(data) {*/
/*                     // Remove current options*/
/*                     $('#resultado').html(data);*/
/*                 }*/
/*             });*/
/*             return false;*/
/*         });*/
/*         $('#mapa_type_save').click(function(){*/
/*            var nombre = $('#mapa_type_nombre').val();*/
/*            $.ajax({*/
/*                 type: "POST",*/
/*                 url: "{{ url('ajax_busqueda') }}?lat=" + $('#mapa_type_latitud').val() + "&lon=" + $('#mapa_type_longitud').val() + "&nombre=" + nombre,*/
/*                 success: function(data) {*/
/*                     // Remove current options*/
/*                     $('#resultado').html(data);*/
/*                 }*/
/*             });*/
/*             return false;*/
/*         });*/
/*     });*/
/* </script>*/
/* {% endblock %}*/
/* {% block js_head %}*/
/*  <script src="{{ asset('assets/js/OpenLayers-2.13.1/OpenLayers.js') }}"></script>*/
/* */
/*                        <script>*/
/*                         var map;*/
/*         var centerWGS84, centerOSM;*/
/*         var projWGS84, projSphericalMercator;*/
/*         var osmLayer;*/
/*         */
/*         function init(){*/
/* */
/*         	projWGS84 = new OpenLayers.Projection("EPSG:4326");*/
/* 			projSphericalMercator = new OpenLayers.Projection("EPSG:900913");  */
/* 			*/
/* 			centerWGS84=new OpenLayers.LonLat(-89.218846,13.697911);*/
/* 			centerOSM = transformToSphericalMercator(centerWGS84);*/
/* */
/* 			map = new OpenLayers.Map("Map");*/
/* 			*/
/* 			var ctrl = new OpenLayers.Control.MousePosition()*/
/* 			ctrl.formatOutput = transformMouseCoords; */
/* 			map.addControl(ctrl);*/
/* */
/*         	osmLayer = new OpenLayers.Layer.OSM();*/
/* */
/*         	map.addLayer(osmLayer);*/
/*         	map.setCenter(centerOSM, 9);            */
/*             map.events.register("mousemove", map, mouseMoveHandler);*/
/*             */
/*             var click = new OpenLayers.Control.Click();*/
/*             map.addControl(click);*/
/*             click.activate();*/
/*         }*/
/*         function mouseMoveHandler(e) {*/
/*         	var position = this.events.getMousePosition(e);*/
/*         	var lonlat = map.getLonLatFromPixel(position);*/
/*         	lonlat = transformMouseCoords(lonlat);					*/
/*         }*/
/*         function transformMouseCoords(lonlat) {*/
/*         	var newlonlat=transformToWGS84(lonlat);*/
/* 			var x = Math.round(newlonlat.lon*10000)/10000;*/
/* 			var y = Math.round(newlonlat.lat*10000)/10000;*/
/* 			newlonlat = new OpenLayers.LonLat(x,y);*/
/* 			return newlonlat;*/
/*         }*/
/*         function transformToWGS84( sphMercatorCoords) {*/
/*         	// Transforma desde SphericalMercator a WGS84*/
/*         	// Devuelve un OpenLayers.LonLat con el pto transformado*/
/*         	var clon = sphMercatorCoords.clone(); // Si no uso un clon me transforma el punto original*/
/*         	var pointWGS84= clon.transform(*/
/*                     new OpenLayers.Projection("EPSG:900913"), // to Spherical Mercator Projection;*/
/*         			new OpenLayers.Projection("EPSG:4326")); // transform from WGS 1984*/
/*         	return pointWGS84;*/
/*         }*/
/*         function transformToSphericalMercator( wgs84LonLat) {*/
/*         	// Transforma desde SphericalMercator a WGS84*/
/*         	// Devuelve un OpenLayers.LonLat con el pto transformado*/
/*         	var clon = wgs84LonLat.clone(); // Si no uso un clon me transforma el punto original*/
/*         	var pointSphMerc= clon.transform(*/
/*                     new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984*/
/*                     new OpenLayers.Projection("EPSG:900913")); // to Spherical Mercator Projection;*/
/*         	return pointSphMerc;*/
/*         }*/
/*         OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                */
/*             defaultHandlerOptions: {*/
/*                 'single': true,*/
/*                 'double': false,*/
/*                 'pixelTolerance': 0,*/
/*                 'stopSingle': false,*/
/*                 'stopDouble': false*/
/*             },*/
/* */
/*             initialize: function(options) {*/
/*                 this.handlerOptions = OpenLayers.Util.extend(*/
/*                     {}, this.defaultHandlerOptions*/
/*                 );*/
/*                 OpenLayers.Control.prototype.initialize.apply(*/
/*                     this, arguments*/
/*                 ); */
/*                 this.handler = new OpenLayers.Handler.Click(*/
/*                     this, {*/
/*                         'click': this.trigger*/
/*                     }, this.handlerOptions*/
/*                 );*/
/*             }, */
/*             trigger: function(e) {*/
/*                 var lonlat = map.getLonLatFromPixel(e.xy);*/
/*                 lonlat = transformMouseCoords(lonlat);*/
/*         	    document.getElementById("mapa_type_latitud").value = lonlat.lat;*/
/* 			    document.getElementById("mapa_type_longitud").value = lonlat.lon*/
/*             }*/
/*         });*/
/*   </script>*/
/*   <link rel="stylesheet" href="{{ asset('assets/js/daterangepicker/daterangepicker.css') }}" />*/
/*   <script src="{{ asset('assets/js/daterangepicker/jquery-1.11.2.min.js') }}"></script>*/
/*   <script src="{{ asset('assets/js/daterangepicker/moment.min.js') }}"></script>*/
/*   <script src="{{ asset('assets/js/daterangepicker/jquery.daterangepicker.js') }}"></script>*/
/* 		<script src="{{ asset('assets/js/daterangepicker/demo.js') }}"></script>*/
/* 		<style>*/
/* 		.demo { margin:30px 0;}*/
/* 		.date-picker-wrapper .month-wrapper table .day.lalala { background-color:orange; }*/
/* 		.options { display:none; border-left:6px solid #8ae; padding:10px; font-size:12px; line-height:1.4; background-color:#eee; border-radius:4px;}*/
/* 		.date-picker-wrapper.date-range-picker19 .day.first-date-selected { background-color: red !important; }*/
/* 		.date-picker-wrapper.date-range-picker19 .day.last-date-selected { background-color: orange !important; }*/
/* 		</style>*/
/* {% endblock %}*/
/* {% block body_tag %}onload="init()"{% endblock %}*/
/* */
