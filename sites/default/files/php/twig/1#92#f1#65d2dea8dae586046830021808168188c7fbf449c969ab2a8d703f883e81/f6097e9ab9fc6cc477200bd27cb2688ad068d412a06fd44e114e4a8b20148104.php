<?php

/* core/modules/system/templates/dropbutton-wrapper.html.twig */
class __TwigTemplate_92f165d2dea8dae586046830021808168188c7fbf449c969ab2a8d703f883e81 extends Twig_Template
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
        // line 15
        if ((isset($context["children"]) ? $context["children"] : null)) {
            // line 16
            echo "  ";
            ob_start();
            // line 17
            echo "    <div class=\"dropbutton-wrapper\">
      <div class=\"dropbutton-widget\">
        ";
            // line 19
            echo twig_drupal_escape_filter($this->env, (isset($context["children"]) ? $context["children"] : null), "html", null, true);
            echo "
      </div>
    </div>
  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        }
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/dropbutton-wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 19,  21 => 16,  24 => 17,  19 => 15,);
    }
}
