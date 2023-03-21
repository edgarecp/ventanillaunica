<?php

/* CpsFludocAdmBundle:Derivacion:_new.html.twig */
class __TwigTemplate_e87d28b0e9b59ea27bc9fce1db498e9d extends Twig_Template
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
        // line 1
        echo "<div class=\"grid_12 prefix_2\">
    <fieldset>
        <legend>Derivar</legend>
        <form action=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath(((isset($context["ruta"]) ? $context["ruta"] : null) . "_create"));
        echo "\" method=\"POST\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
;
        echo ">
            <div>
                <div>";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "</div>
                <div>";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "servicio"), 'row');
        echo "</div>
                <div>
                    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "observacion"), 'errors');
        echo "
                    ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "observacion"), 'label');
        echo "
                    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "observacion"), 'widget', array("attr" => array("class" => "largo")));
        echo "
                </div>
                ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
            </div>
            <center><button type=\"submit\" class='btn'>GRABAR</button></center>
        </form>
    </fieldset>
</div><div class=\"clear\"></div>
<a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("adm_docrec_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
        echo "\" class='btn_ga'>Volver</a>
";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Derivacion:_new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 19,  54 => 13,  45 => 10,  36 => 7,  24 => 4,  19 => 1,  134 => 22,  130 => 21,  128 => 20,  125 => 19,  122 => 18,  120 => 17,  117 => 16,  114 => 15,  111 => 14,  105 => 13,  58 => 12,  55 => 11,  52 => 10,  49 => 11,  46 => 8,  41 => 9,  37 => 5,  32 => 6,  29 => 3,);
    }
}
