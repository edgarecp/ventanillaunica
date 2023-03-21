<?php

/* CpsFludocAdmBundle:Docrec:listado.html.twig */
class __TwigTemplate_453a6c7ff11aa34b7d39e06125e866ae extends Twig_Template
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
        $this->env->loadTemplate("CpsFludocAdmBundle:Docrec:listado.html.twig", "1911181125")->display($context);
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:listado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}


/* CpsFludocAdmBundle:Docrec:listado.html.twig */
class __TwigTemplate_453a6c7ff11aa34b7d39e06125e866ae_1911181125 extends Twig_Template
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

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "            ";
        // line 7
        echo "            <th width= \"8%\">";
        $context["fld"] = "recepcionEl";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), twig_capitalize_string_filter($this->env, (isset($context["fld"]) ? $context["fld"] : null)), ("z." . (isset($context["fld"]) ? $context["fld"] : null)));
        echo "</th>
            <th width= \"8%\">";
        // line 8
        $context["fld"] = "cite";
        echo "       ";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), twig_capitalize_string_filter($this->env, (isset($context["fld"]) ? $context["fld"] : null)), ("z." . (isset($context["fld"]) ? $context["fld"] : null)));
        echo "</th>
            <th width=\"43%\">";
        // line 9
        $context["fld"] = "referencia";
        echo " ";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), twig_capitalize_string_filter($this->env, (isset($context["fld"]) ? $context["fld"] : null)), ("z." . (isset($context["fld"]) ? $context["fld"] : null)));
        echo "</th>
            <th width=\"15%\">";
        // line 10
        $context["fld"] = "personaRem";
        echo " ";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), "Remite", ("z." . (isset($context["fld"]) ? $context["fld"] : null)));
        echo "</th>
            <th width= \"5%\">";
        // line 11
        $context["fld"] = "servicio.abreviatura";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), "Servicio", "s.abreviatura");
        echo "</th>
            <th width= \"5%\">";
        // line 12
        $context["fld"] = "estado.abreviatura";
        echo "  ";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), "Estado", "e.abreviatura");
        echo "</th>
        ";
    }

    // line 14
    public function block_detalle($context, array $blocks = array())
    {
        // line 15
        echo "            <td>";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "recepcionEl")) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "recepcionEl"), "Y-m-d"), "html", null, true);
        }
        echo "</td>
            <td>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "cite"), "html", null, true);
        echo "</td>
            <td>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "referencia"), "html", null, true);
        echo "</td>
            <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "personaRem"), "html", null, true);
        echo "</td>
            <td align='center'>";
        // line 19
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "servicioActual")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "servicioActual"), "abreviatura"), "html", null, true);
        }
        echo "</td>
            <td align='center'>";
        // line 20
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "estadoActual")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "estadoActual"), "abreviatura"), "html", null, true);
        }
        echo "</td>
            ";
        // line 21
        $context["cantTrans"] = twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "derivaciones"));
        // line 22
        echo "            ";
        $this->displayParentBlock("detalle", $context, $blocks);
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:listado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 22,  154 => 21,  148 => 20,  142 => 19,  138 => 18,  134 => 17,  130 => 16,  123 => 15,  120 => 14,  112 => 12,  107 => 11,  101 => 10,  95 => 9,  89 => 8,  83 => 7,  81 => 6,  78 => 5,  31 => 4,  28 => 3,);
    }
}
