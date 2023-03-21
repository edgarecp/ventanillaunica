<?php

/* GeneralComunBundle:Main:_menu.html.twig */
class __TwigTemplate_2f088b107ee863f44fb2d2231915a285 extends Twig_Template
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
        $menumenu274Options = array(
            "showDelay" =>0,
            "hideDelay" =>0,
        );
        $menumenu274 = $this->env->getExtension('ui.core')->getWidget('ui.menu');
        echo $menumenu274->initWidget("menu274",preg_replace('/\w=""/'," ","")        );
            // line 2
            echo "    ";
            $htmlhtml856a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml856a->initWidget(null,null,"li");
            echo $htmlhtml856a->initWidget("html856a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("main")) . "'")))            ,"a"            ,"Inicio"            );
            echo $htmlhtml856a->endWidget("a");
            echo $htmlhtml856a->endWidget("li");
            // line 3
            echo "    ";
            $htmlhtml391a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml391a->initWidget(null,null,"li");
            echo $htmlhtml391a->initWidget("html391a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("adm_docrec")) . "'")))            ,"a"            ,"Recepcion de Documentos"            );
            echo $htmlhtml391a->endWidget("a");
            echo $htmlhtml391a->endWidget("li");
            // line 4
            echo "   
    ";
            // line 5
            $htmlhtml997a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml997a->initWidget(null,null,"li");
            echo $htmlhtml997a->initWidget("html997a",preg_replace('/\w=""/'," ","")            ,"a"            ,"Reporte"            );
            echo $htmlhtml997a->initWidget(null,null,"ul");
                // line 6
                echo "        ";
                $htmlhtml579a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml579a->initWidget(null,null,"li");
                echo $htmlhtml579a->initWidget("html579a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("acceso")) . "'")))                ,"a"                ,"Acceso"                );
                echo $htmlhtml579a->endWidget("a");
                echo $htmlhtml579a->endWidget("li");
                // line 7
                echo "    ";
            echo $htmlhtml997a->endWidget("ul");
            echo $htmlhtml997a->endWidget("a");
            echo $htmlhtml997a->endWidget("li");
            // line 8
            echo "    
    ";
            // line 9
            $htmlhtml174a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml174a->initWidget(null,null,"li");
            echo $htmlhtml174a->initWidget("html174a",preg_replace('/\w=""/'," ","")            ,"a"            ,"Ambiente"            );
            echo $htmlhtml174a->initWidget(null,null,"ul");
                // line 10
                echo "        ";
                $htmlhtml46a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml46a->initWidget(null,null,"li");
                echo $htmlhtml46a->initWidget("html46a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("servicio")) . "'")))                ,"a"                ,"Servicio"                );
                echo $htmlhtml46a->endWidget("a");
                echo $htmlhtml46a->endWidget("li");
                // line 11
                echo "        ";
                if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "perfil"), "id"), array(0 => 1, 1 => 2))) {
                    // line 12
                    echo "            ";
                    $htmlhtml963a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                    echo $htmlhtml963a->initWidget(null,null,"li");
                    echo $htmlhtml963a->initWidget("html963a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("noticia")) . "'")))                    ,"a"                    ,"Noticia"                    );
                    echo $htmlhtml963a->endWidget("a");
                    echo $htmlhtml963a->endWidget("li");
                    // line 13
                    echo "        ";
                }
                // line 14
                echo "        ";
                $htmlhtml780a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml780a->initWidget(null,null,"li");
                echo $htmlhtml780a->initWidget("html780a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("geco_estado")) . "'")))                ,"a"                ,"Tipo de Estado"                );
                echo $htmlhtml780a->endWidget("a");
                echo $htmlhtml780a->endWidget("li");
                // line 15
                echo "        ";
                if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "perfil"), "id"), array(0 => 1, 1 => 2))) {
                    // line 16
                    echo "            ";
                    $htmlhtml311a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                    echo $htmlhtml311a->initWidget(null,null,"li");
                    echo $htmlhtml311a->initWidget("html311a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("usuario")) . "'")))                    ,"a"                    ,"Usuario"                    );
                    echo $htmlhtml311a->endWidget("a");
                    echo $htmlhtml311a->endWidget("li");
                    // line 17
                    echo "            ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "perfil"), "id") == 1)) {
                        // line 18
                        echo "                ";
                        $htmlhtml800a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                        echo $htmlhtml800a->initWidget(null,null,"li");
                        echo $htmlhtml800a->initWidget("html800a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("perfil")) . "'")))                        ,"a"                        ,"Tipo Perfil Usuario"                        );
                        echo $htmlhtml800a->endWidget("a");
                        echo $htmlhtml800a->endWidget("li");
                        // line 19
                        echo "            ";
                    }
                    // line 20
                    echo "        ";
                }
                // line 21
                echo "        ";
                $htmlhtml20a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml20a->initWidget(null,null,"li");
                echo $htmlhtml20a->initWidget("html20a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("usuario_cambpass")) . "'")))                ,"a"                ,"Cambiar Password"                );
                echo $htmlhtml20a->endWidget("a");
                echo $htmlhtml20a->endWidget("li");
                // line 22
                echo "    ";
            echo $htmlhtml174a->endWidget("ul");
            echo $htmlhtml174a->endWidget("a");
            echo $htmlhtml174a->endWidget("li");
            // line 23
            echo "
    ";
            // line 24
            $htmlhtml165a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml165a->initWidget(null,null,"li");
            echo $htmlhtml165a->initWidget("html165a",preg_replace('/\w=""/'," ","")            ,"a"            ,"Ayuda"            );
            echo $htmlhtml165a->initWidget(null,null,"ul");
                // line 25
                echo "        ";
                $htmlhtml773a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml773a->initWidget(null,null,"li");
                echo $htmlhtml773a->initWidget("html773a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("ayuda")) . "'")))                ,"a"                ,"Ayuda"                );
                echo $htmlhtml773a->endWidget("a");
                echo $htmlhtml773a->endWidget("li");
                // line 26
                echo "        ";
                $htmlhtml963a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml963a->initWidget(null,null,"li");
                echo $htmlhtml963a->initWidget("html963a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("acercade")) . "'")))                ,"a"                ,"Acerca de"                );
                echo $htmlhtml963a->endWidget("a");
                echo $htmlhtml963a->endWidget("li");
                // line 27
                echo "    ";
            echo $htmlhtml165a->endWidget("ul");
            echo $htmlhtml165a->endWidget("a");
            echo $htmlhtml165a->endWidget("li");
            // line 28
            echo "    
    ";
            // line 29
            $htmlhtml220a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml220a->initWidget(null,null,"li");
            echo $htmlhtml220a->initWidget("html220a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("acceso_regsalida")) . "'")))            ,"a"            ,"Salir"            );
            echo $htmlhtml220a->endWidget("a");
            echo $htmlhtml220a->endWidget("li");
        echo $menumenu274->endWidget();
        echo $menumenu274->build()                
                ->in("#menu274")                
                ->addOptions($menumenu274Options)
                ->execute();        
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Main:_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 29,  160 => 28,  155 => 27,  148 => 26,  141 => 25,  136 => 24,  133 => 23,  128 => 22,  118 => 20,  115 => 19,  105 => 17,  98 => 16,  95 => 15,  88 => 14,  85 => 13,  78 => 12,  75 => 11,  68 => 10,  63 => 9,  60 => 8,  48 => 6,  43 => 5,  40 => 4,  33 => 3,  19 => 1,  166 => 76,  164 => 75,  162 => 74,  158 => 72,  150 => 67,  144 => 66,  140 => 65,  134 => 61,  129 => 59,  121 => 21,  116 => 53,  110 => 51,  108 => 18,  104 => 49,  94 => 42,  87 => 37,  84 => 36,  59 => 14,  55 => 7,  50 => 11,  46 => 10,  41 => 8,  37 => 7,  34 => 6,  31 => 5,  26 => 2,);
    }
}
