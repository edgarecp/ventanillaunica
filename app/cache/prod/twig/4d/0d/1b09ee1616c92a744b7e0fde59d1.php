<?php

/* CpsFludocAdmBundle:Docrec:imprimirhojaruta.html.twig */
class __TwigTemplate_4d0d1b09ee1616c92a744b7e0fde59d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle::blanco.html.twig");

        $this->blocks = array(
            'cuerpo' => array($this, 'block_cuerpo'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle::blanco.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 3
        $this->env->loadTemplate("GeneralComunBundle:Publico:_tituloReporte.html.twig")->display(array_merge($context, array("centro" => "Caja Petrolera de Salud", "centro2" => "HOJA DE RUTA")));
        // line 4
        $this->env->loadTemplate("CpsFludocAdmBundle:Publico:_docrec.html.twig")->display(array_merge($context, array("colilla" => false)));
        // line 5
        echo "<br />
";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 7));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 7
            echo "<table border='1' width='100%'>
   <tr>
      <td colspan='9' align='left'><b>Destino:</b></td>
   </tr><tr>
      <td colspan='9' align='left'><b>Comentario:</b></td>
   </tr><tr><td colspan='9'>&nbsp;</td>
   </tr><tr>
      <td align='left' width='20%'><b>Fecha de Ingreso:</b></td>
      <td width='5%'>&nbsp;</td>
      <td width='5%'>&nbsp;</td>
      <td width='8%'>&nbsp;</td>
      <td align='center' width='20%'><b>Fecha de Salida:</b></td>
      <td width='5%'>&nbsp;</td>
      <td width='5%'>&nbsp;</td>
      <td width='8%'>&nbsp;</td>
      <td align='center' width='24%'><b>&nbsp;</b></td>
   </tr><tr>
      <td colspan='8'>&nbsp;</td>
      <td align='center'><b>Firma y sello</b></td>
   </tr>
</table>
<br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<br /><br />
Revisa el estado de tu documentacion en la pagina web: www.cps.com.bo/ventanillaunica, ingresando el Codigo y el PIN
<br /><br />
";
        // line 34
        $this->env->loadTemplate("CpsFludocAdmBundle:Publico:_docrec.html.twig")->display(array_merge($context, array("colilla" => true)));
        // line 35
        echo "   
";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:imprimirhojaruta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 35,  76 => 34,  70 => 30,  42 => 7,  38 => 6,  35 => 5,  33 => 4,  31 => 3,  28 => 2,);
    }
}
