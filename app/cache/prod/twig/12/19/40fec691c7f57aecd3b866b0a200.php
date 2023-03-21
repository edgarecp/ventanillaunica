<?php

/* CpsFludocAdmBundle:Docrec:new.html.twig */
class __TwigTemplate_121940fec691c7f57aecd3b866b0a200 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle::layout.html.twig");

        $this->blocks = array(
            'oJScYCss' => array($this, 'block_oJScYCss'),
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
    public function block_oJScYCss($context, array $blocks = array())
    {
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'stylesheet');
        echo " ";
        echo $this->env->getExtension('genemu.twig.extension.form')->renderJavascript((isset($context["form"]) ? $context["form"] : null));
        echo " ";
    }

    // line 5
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $context["ruta"] = "adm_docrec";
        // line 7
        echo "    ";
        $context["tit"] = "Documentacion Recibida";
        echo "        
    ";
        // line 8
        $context["tam"] = "12";
        // line 9
        echo "    ";
        $context["accion"] = (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "accion"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "accion"), "method"), "new")) : ("new"));
        // line 10
        echo "    ";
        if (((isset($context["accion"]) ? $context["accion"] : null) == "edit")) {
            $context["cantTrans"] = twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "derivaciones"));
        }
        // line 11
        echo "
    ";
        // line 12
        $this->env->loadTemplate("CpsFludocAdmBundle:Docrec:new.html.twig", "1442045586")->display($context);
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 12,  60 => 11,  55 => 10,  52 => 9,  50 => 8,  45 => 7,  42 => 6,  39 => 5,  29 => 3,);
    }
}


/* CpsFludocAdmBundle:Docrec:new.html.twig */
class __TwigTemplate_121940fec691c7f57aecd3b866b0a200_1442045586 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle:Public:_new.html.twig");

        $this->blocks = array(
            'datos' => array($this, 'block_datos'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle:Public:_new.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_datos($context, array $blocks = array())
    {
        // line 14
        echo "        <table class='sinBorde'>
            <tr><td width='20%'></td><td width='80%'></td></tr>           
            <tr><td>";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "recepcionEl"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "recepcionEl"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "recepcionEl"), 'widget');
        echo "</td></tr>
            <tr><td>";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fechaDoc"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fechaDoc"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fechaDoc"), 'widget', array("attr" => array("maxlength" => "10", "class" => "fch")));
        echo "</td></tr>
            <tr><td>";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cite"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cite"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cite"), 'widget');
        echo "</td></tr>
            <tr><td>";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "referencia"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "referencia"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "referencia"), 'widget', array("attr" => array("class" => "largo")));
        echo "</td></tr>
            <tr><td>";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "institucionRem"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "institucionRem"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "institucionRem"), 'widget', array("attr" => array("class" => "largo")));
        echo "</td></tr>
            <tr><td>";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personaRem"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personaRem"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personaRem"), 'widget', array("attr" => array("class" => "mediano")));
        echo "</td></tr>
            <tr><td>";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cargoRem"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cargoRem"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cargoRem"), 'widget', array("attr" => array("class" => "mediano")));
        echo "</td></tr>
            <tr><td>";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "folio"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "folio"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "folio"), 'widget', array("attr" => array("class" => "mini")));
        echo "</td></tr>
            <tr><td>";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "archivo"), 'label');
        echo "</td><td>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "archivo"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "archivo"), 'widget');
        echo "</td></tr>
\t    </table>
\t    ";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 24,  164 => 23,  157 => 22,  150 => 21,  143 => 20,  136 => 19,  129 => 18,  122 => 17,  115 => 16,  111 => 14,  108 => 13,  63 => 12,  60 => 11,  55 => 10,  52 => 9,  50 => 8,  45 => 7,  42 => 6,  39 => 5,  29 => 3,);
    }
}
