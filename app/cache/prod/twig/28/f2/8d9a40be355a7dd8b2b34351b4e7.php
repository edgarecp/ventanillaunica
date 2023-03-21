<?php

/* GeneralComunBundle:Acceso:listado.html.twig */
class __TwigTemplate_28f28d9a40be355a7dd8b2b34351b4e7 extends Twig_Template
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

    // line 2
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $context["accReg"] = "N";
        // line 4
        echo "    ";
        $context["btnNew"] = "N";
        // line 5
        echo "    ";
        $this->env->loadTemplate("GeneralComunBundle:Acceso:listado.html.twig", "95927636")->display($context);
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Acceso:listado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}


/* GeneralComunBundle:Acceso:listado.html.twig */
class __TwigTemplate_28f28d9a40be355a7dd8b2b34351b4e7_95927636 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle:Public:_listado.html.twig");

        $this->blocks = array(
            'titulo' => array($this, 'block_titulo'),
            'detalle' => array($this, 'block_detalle'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle:Public:_listado.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_titulo($context, array $blocks = array())
    {
        // line 7
        echo "            ";
        echo "        
            <th width='35%'>";
        // line 8
        $context["fld"] = "usuario.nombreCompleto";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), "Nombre Completo", "u.paterno, u.materno, u.nombre");
        echo "</th>
            <th width='20%'>";
        // line 9
        $context["fld"] = "maquina";
        echo "   ";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), twig_capitalize_string_filter($this->env, (isset($context["fld"]) ? $context["fld"] : null)), ("t." . (isset($context["fld"]) ? $context["fld"] : null)));
        echo "</th>
            <th width='20%'>";
        // line 10
        $context["fld"] = "ingresoEl";
        echo " ";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), twig_capitalize_string_filter($this->env, (isset($context["fld"]) ? $context["fld"] : null)), ("t." . (isset($context["fld"]) ? $context["fld"] : null)));
        echo "</th>
            <th width='20%'>";
        // line 11
        $context["fld"] = "salidaEl";
        echo "  ";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), twig_capitalize_string_filter($this->env, (isset($context["fld"]) ? $context["fld"] : null)), ("t." . (isset($context["fld"]) ? $context["fld"] : null)));
        echo "</th>
        ";
    }

    // line 14
    public function block_detalle($context, array $blocks = array())
    {
        echo "  
            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "usuario"), "html", null, true);
        echo "</td>
            <td>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "maquina"), "html", null, true);
        echo "</td>
            <td class='fch'>";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "ingresoEl"), "d/m/Y h:i:s"), "html", null, true);
        echo "</td>             
            <td class='fch'>";
        // line 18
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "salidaEl")) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "salidaEl"), "d/m/Y h:i:s"), "html", null, true);
        }
        echo "</td>
        ";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Acceso:listado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 18,  129 => 17,  125 => 16,  121 => 15,  116 => 14,  108 => 11,  102 => 10,  96 => 9,  91 => 8,  87 => 7,  84 => 6,  37 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
