<?php

/* core/themes/seven/templates/menu-local-tasks.html.twig */
class __TwigTemplate_a519f17f147fcd06708d837da92848e9e44f5563713dc886555d2860ae60dc83 extends Twig_Template
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
        // line 18
        if ((isset($context["primary"]) ? $context["primary"] : null)) {
            // line 19
            echo "  <h2 id=\"primary-tabs-title\" class=\"visually-hidden\">";
            echo twig_render_var(t("Primary tabs"));
            echo "</h2>
  <nav role=\"navigation\" class=\"is-horizontal is-collapsible\" aria-labelledby=\"primary-tabs-title\" data-drupal-nav-tabs>
    <button class=\"reset-appearance tabs__tab tabs__trigger\" aria-label=\"";
            // line 21
            echo twig_render_var(t("Primary tabs display toggle"));
            echo "\" data-drupal-nav-tabs-trigger>&bull;&bull;&bull;</button>
    <ul class=\"tabs primary clearfix\" data-drupal-nav-tabs-target>";
            // line 22
            echo twig_drupal_escape_filter($this->env, (isset($context["primary"]) ? $context["primary"] : null), "html", null, true);
            echo "</ul>
  </nav>
";
        }
        // line 25
        if ((isset($context["secondary"]) ? $context["secondary"] : null)) {
            // line 26
            echo "  <h2 id=\"secondary-tabs-title\" class=\"visually-hidden\">";
            echo twig_render_var(t("Secondary tabs"));
            echo "</h2>
  <nav role=\"navigation\" class=\"is-horizontal\" aria-labelledby=\"secondary-tabs-title\" data-drupal-nav-tabs>
    <ul class=\"tabs secondary clearfix\">";
            // line 28
            echo twig_drupal_escape_filter($this->env, (isset($context["secondary"]) ? $context["secondary"] : null), "html", null, true);
            echo "</ul>
  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/seven/templates/menu-local-tasks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 28,  39 => 26,  37 => 25,  31 => 22,  116 => 103,  110 => 100,  107 => 99,  105 => 98,  99 => 96,  93 => 93,  90 => 92,  87 => 91,  81 => 88,  78 => 87,  76 => 86,  72 => 85,  65 => 81,  62 => 80,  56 => 78,  54 => 77,  48 => 73,  42 => 71,  40 => 70,  35 => 69,  29 => 67,  27 => 21,  23 => 65,  43 => 24,  30 => 22,  26 => 21,  21 => 19,  19 => 18,);
    }
}
