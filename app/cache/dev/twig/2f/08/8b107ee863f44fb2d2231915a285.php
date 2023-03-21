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
        $menumenu794Options = array(
            "showDelay" =>0,
            "hideDelay" =>0,
        );
        $menumenu794 = $this->env->getExtension('ui.core')->getWidget('ui.menu');
        echo $menumenu794->initWidget("menu794",preg_replace('/\w=""/'," ","")        );
            // line 2
            echo "    ";
            $htmlhtml249a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml249a->initWidget(null,null,"li");
            echo $htmlhtml249a->initWidget("html249a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("main")) . "'")))            ,"a"            ,"Inicio"            );
            echo $htmlhtml249a->endWidget("a");
            echo $htmlhtml249a->endWidget("li");
            // line 3
            echo "    ";
            $htmlhtml790a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml790a->initWidget(null,null,"li");
            echo $htmlhtml790a->initWidget("html790a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("adm_docrec")) . "'")))            ,"a"            ,"Recepcion de Documentos"            );
            echo $htmlhtml790a->endWidget("a");
            echo $htmlhtml790a->endWidget("li");
            // line 4
            echo "   
    ";
            // line 5
            $htmlhtml969a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml969a->initWidget(null,null,"li");
            echo $htmlhtml969a->initWidget("html969a",preg_replace('/\w=""/'," ","")            ,"a"            ,"Reporte"            );
            echo $htmlhtml969a->initWidget(null,null,"ul");
                // line 6
                echo "        ";
                $htmlhtml289a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml289a->initWidget(null,null,"li");
                echo $htmlhtml289a->initWidget("html289a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("acceso")) . "'")))                ,"a"                ,"Acceso"                );
                echo $htmlhtml289a->endWidget("a");
                echo $htmlhtml289a->endWidget("li");
                // line 7
                echo "    ";
            echo $htmlhtml969a->endWidget("ul");
            echo $htmlhtml969a->endWidget("a");
            echo $htmlhtml969a->endWidget("li");
            // line 8
            echo "    
    ";
            // line 9
            $htmlhtml949a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml949a->initWidget(null,null,"li");
            echo $htmlhtml949a->initWidget("html949a",preg_replace('/\w=""/'," ","")            ,"a"            ,"Ambiente"            );
            echo $htmlhtml949a->initWidget(null,null,"ul");
                // line 10
                echo "        ";
                $htmlhtml699a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml699a->initWidget(null,null,"li");
                echo $htmlhtml699a->initWidget("html699a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("servicio")) . "'")))                ,"a"                ,"Servicio"                );
                echo $htmlhtml699a->endWidget("a");
                echo $htmlhtml699a->endWidget("li");
                // line 11
                echo "        ";
                if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "perfil"), "id"), array(0 => 1, 1 => 2))) {
                    // line 12
                    echo "            ";
                    $htmlhtml449a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                    echo $htmlhtml449a->initWidget(null,null,"li");
                    echo $htmlhtml449a->initWidget("html449a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("noticia")) . "'")))                    ,"a"                    ,"Noticia"                    );
                    echo $htmlhtml449a->endWidget("a");
                    echo $htmlhtml449a->endWidget("li");
                    // line 13
                    echo "        ";
                }
                // line 14
                echo "        ";
                $htmlhtml664a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml664a->initWidget(null,null,"li");
                echo $htmlhtml664a->initWidget("html664a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("geco_estado")) . "'")))                ,"a"                ,"Tipo de Estado"                );
                echo $htmlhtml664a->endWidget("a");
                echo $htmlhtml664a->endWidget("li");
                // line 15
                echo "        ";
                if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "perfil"), "id"), array(0 => 1, 1 => 2))) {
                    // line 16
                    echo "            ";
                    $htmlhtml320a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                    echo $htmlhtml320a->initWidget(null,null,"li");
                    echo $htmlhtml320a->initWidget("html320a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("usuario")) . "'")))                    ,"a"                    ,"Usuario"                    );
                    echo $htmlhtml320a->endWidget("a");
                    echo $htmlhtml320a->endWidget("li");
                    // line 17
                    echo "            ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "perfil"), "id") == 1)) {
                        // line 18
                        echo "                ";
                        $htmlhtml606a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                        echo $htmlhtml606a->initWidget(null,null,"li");
                        echo $htmlhtml606a->initWidget("html606a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("perfil")) . "'")))                        ,"a"                        ,"Tipo Perfil Usuario"                        );
                        echo $htmlhtml606a->endWidget("a");
                        echo $htmlhtml606a->endWidget("li");
                        // line 19
                        echo "            ";
                    }
                    // line 20
                    echo "        ";
                }
                // line 21
                echo "        ";
                $htmlhtml66a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml66a->initWidget(null,null,"li");
                echo $htmlhtml66a->initWidget("html66a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("usuario_cambpass")) . "'")))                ,"a"                ,"Cambiar Password"                );
                echo $htmlhtml66a->endWidget("a");
                echo $htmlhtml66a->endWidget("li");
                // line 22
                echo "    ";
            echo $htmlhtml949a->endWidget("ul");
            echo $htmlhtml949a->endWidget("a");
            echo $htmlhtml949a->endWidget("li");
            // line 23
            echo "
    ";
            // line 24
            $htmlhtml557a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml557a->initWidget(null,null,"li");
            echo $htmlhtml557a->initWidget("html557a",preg_replace('/\w=""/'," ","")            ,"a"            ,"Ayuda"            );
            echo $htmlhtml557a->initWidget(null,null,"ul");
                // line 25
                echo "        ";
                $htmlhtml20a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml20a->initWidget(null,null,"li");
                echo $htmlhtml20a->initWidget("html20a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("ayuda")) . "'")))                ,"a"                ,"Ayuda"                );
                echo $htmlhtml20a->endWidget("a");
                echo $htmlhtml20a->endWidget("li");
                // line 26
                echo "        ";
                $htmlhtml690a = $this->env->getExtension('ui.core')->getWidget('ui.html');
                echo $htmlhtml690a->initWidget(null,null,"li");
                echo $htmlhtml690a->initWidget("html690a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("acercade")) . "'")))                ,"a"                ,"Acerca de"                );
                echo $htmlhtml690a->endWidget("a");
                echo $htmlhtml690a->endWidget("li");
                // line 27
                echo "    ";
            echo $htmlhtml557a->endWidget("ul");
            echo $htmlhtml557a->endWidget("a");
            echo $htmlhtml557a->endWidget("li");
            // line 28
            echo "    
    ";
            // line 29
            $htmlhtml462a = $this->env->getExtension('ui.core')->getWidget('ui.html');
            echo $htmlhtml462a->initWidget(null,null,"li");
            echo $htmlhtml462a->initWidget("html462a",preg_replace('/\w=""/'," ","" . sprintf('onclick="%s"',(("href='" . $this->env->getExtension('routing')->getPath("acceso_regsalida")) . "'")))            ,"a"            ,"Salir"            );
            echo $htmlhtml462a->endWidget("a");
            echo $htmlhtml462a->endWidget("li");
        echo $menumenu794->endWidget();
        echo $menumenu794->build()                
                ->in("#menu794")                
                ->addOptions($menumenu794Options)
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
