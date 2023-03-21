<?php

/* CpsFludocAdmBundle:Derivacion:_listado.html.twig */
class __TwigTemplate_9c39847d9493b604cd2eeceb26435dc5 extends Twig_Template
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
        $this->env->loadTemplate("CpsFludocAdmBundle:Derivacion:_listado.html.twig", "324270940")->display($context);
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Derivacion:_listado.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}


/* CpsFludocAdmBundle:Derivacion:_listado.html.twig */
class __TwigTemplate_9c39847d9493b604cd2eeceb26435dc5_324270940 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle:Public:_showDet.html.twig");

        $this->blocks = array(
            'titulos' => array($this, 'block_titulos'),
            'datos' => array($this, 'block_datos'),
            'acciones' => array($this, 'block_acciones'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle:Public:_showDet.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_titulos($context, array $blocks = array())
    {
        // line 3
        echo "    <th width= \"5%\">Id</th>
    <th width= \"9%\">Fecha</th>
    <th width=\"28%\">Servicio</th>
    <th width=\"37%\">Observacion</th>
    <th width= \"9%\">Estado</th>
    <th width= \"9%\">Llegada</th>
    <th width= \"3%\">Op</th>
";
    }

    // line 12
    public function block_datos($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "derivaciones"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["derivacion"]) {
            // line 14
            echo "        <tr>
            <td align='center'>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "id"), "html", null, true);
            echo "</td>
            <td class='fch'>";
            // line 16
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "fecha"), "d/m/Y H:i"), "html", null, true);
            echo "</td>
            <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "servicio"), "html", null, true);
            echo "</td>
            <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "observacion"), "html", null, true);
            echo "</td>
            <td align='center'>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "estado"), "abreviatura"), "html", null, true);
            echo "</td>
            <td class='fch'>";
            // line 20
            if ($this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "recepcionEl")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "recepcionEl"), "d/m/Y H:i"), "html", null, true);
                echo " ";
            }
            echo "</td>
            <td>";
            // line 21
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "estadoActual"), "id") == 1))) {
                // line 22
                echo "                    <a href=\"#\" onclick=\"confirmDelete('";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("adm_derivacion_delete", array("id" => $this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "id"))), "html", null, true);
                echo "', ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "id"), "html", null, true);
                echo " );\" class='btn_b'><span class=\"ui-icon ui-icon-trash\"></span></a>
                ";
            }
            // line 24
            echo "            </td>
        </tr>

        ";
            // line 27
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["derivacion"]) ? $context["derivacion"] : null), "informes"));
            foreach ($context['_seq'] as $context["_key"] => $context["informe"]) {
                // line 28
                echo "            <tr>
                <td></td>
                <td class='fch'>";
                // line 30
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["informe"]) ? $context["informe"] : null), "creadoEl"), "d/m/Y H:i"), "html", null, true);
                echo "</td>
                <td></td>                
                <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["informe"]) ? $context["informe"] : null), "detalle"), "html", null, true);
                echo "</td>
                <td align='center'>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["informe"]) ? $context["informe"] : null), "estado"), "abreviatura"), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['informe'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['derivacion'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 39
    public function block_acciones($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Derivacion:_listado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 39,  167 => 36,  158 => 33,  154 => 32,  149 => 30,  145 => 28,  141 => 27,  136 => 24,  128 => 22,  126 => 21,  119 => 20,  115 => 19,  111 => 18,  107 => 17,  103 => 16,  99 => 15,  96 => 14,  78 => 13,  75 => 12,  64 => 3,  61 => 2,  19 => 1,);
    }
}
