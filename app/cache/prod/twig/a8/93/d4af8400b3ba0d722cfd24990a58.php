<?php

/* CpsFludocAdmBundle:Docrec:filtrar.html.twig */
class __TwigTemplate_a893d4af8400b3ba0d722cfd24990a58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle::layout.html.twig");

        $this->blocks = array(
            'cuerpo' => array($this, 'block_cuerpo'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["ruta"] = ((array_key_exists("vRuta", $context)) ? (_twig_default_filter((isset($context["vRuta"]) ? $context["vRuta"] : null), "adm_docrec")) : ("adm_docrec"));
        // line 5
        echo "    ";
        $context["tit"] = "Documentacion Recibida";
        echo "        
    ";
        // line 6
        $this->env->loadTemplate("CpsFludocAdmBundle:Docrec:filtrar.html.twig", "486251760")->display($context);
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:filtrar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}


/* CpsFludocAdmBundle:Docrec:filtrar.html.twig */
class __TwigTemplate_a893d4af8400b3ba0d722cfd24990a58_486251760 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle:Public:_filtrar.html.twig");

        $this->blocks = array(
            'datos' => array($this, 'block_datos'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle:Public:_filtrar.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_datos($context, array $blocks = array())
    {
        // line 8
        echo "            <div>
            ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "id"), 'label');
        echo "
            ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_id"), 'widget');
        echo "
            ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "id"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "recepcionEl"), 'label');
        echo "
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_recepcionEl"), 'widget');
        echo "
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "recepcionEl"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fechaDoc"), 'label');
        echo "
            ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_fechaDoc"), 'widget');
        echo "
            ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fechaDoc"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cite"), 'label');
        echo "
            ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_cite"), 'widget');
        echo "
            ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cite"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "referencia"), 'label');
        echo "
            ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_referencia"), 'widget');
        echo "
            ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "referencia"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "institucionRem"), 'label');
        echo "
            ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_institucionRem"), 'widget');
        echo "
            ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "institucionRem"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personaRem"), 'label');
        echo "
            ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_personaRem"), 'widget');
        echo "
            ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personaRem"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cargoRem"), 'label');
        echo "
            ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_cargoRem"), 'widget');
        echo "
            ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cargoRem"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "folio"), 'label');
        echo "
            ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_folio"), 'widget');
        echo "
            ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "folio"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "servicioActual"), 'label');
        echo "
            ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_servicioActual"), 'widget');
        echo "
            ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "servicioActual"), 'widget');
        echo "
            </div>
            <div>
            ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "estadoActual"), 'label');
        echo "
            ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fil_estadoActual"), 'widget');
        echo "
            ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "estadoActual"), 'widget');
        echo "
            </div>
        ";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:filtrar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 61,  234 => 60,  230 => 59,  224 => 56,  220 => 55,  216 => 54,  210 => 51,  206 => 50,  202 => 49,  196 => 46,  192 => 45,  188 => 44,  182 => 41,  178 => 40,  174 => 39,  168 => 36,  164 => 35,  160 => 34,  154 => 31,  150 => 30,  146 => 29,  140 => 26,  136 => 25,  132 => 24,  126 => 21,  122 => 20,  118 => 19,  112 => 16,  108 => 15,  104 => 14,  98 => 11,  94 => 10,  90 => 9,  87 => 8,  84 => 7,  39 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
