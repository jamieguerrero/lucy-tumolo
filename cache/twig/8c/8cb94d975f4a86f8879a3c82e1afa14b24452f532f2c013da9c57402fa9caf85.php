<?php

/* partials/login-status.html.twig */
class __TwigTemplate_1ac219d7f3a12d8240db4f79324c64c65483c85b994420fa68e46b38bffd1946 extends Twig_Template
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
        echo "<span class=\"login-status\">
    ";
        // line 2
        if ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "user", array()), "authenticated", array())) {
            // line 3
            echo "        <strong>";
            echo (($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "user", array()), "fullname", array())) ? ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "user", array()), "fullname", array())) : ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "user", array()), "username", array())));
            echo "</strong>, <a class=\"logout\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", array(0 => (((twig_trim_filter((($context["base_url_relative"] ?? null) . $this->getAttribute(($context["uri"] ?? null), "path", array())), "/") . "/task") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", array()), "param_sep", array())) . "login.logout"), 1 => "logout-form", 2 => "logout-nonce"), "method"));
            echo "\">";
            echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate("PLUGIN_LOGIN.BTN_LOGOUT");
            echo "</a>
    ";
        }
        // line 5
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "partials/login-status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<span class=\"login-status\">
    {% if grav.user.authenticated %}
        <strong>{{ grav.user.fullname ?: grav.user.username }}</strong>, <a class=\"logout\" href=\"{{ uri.addNonce((base_url_relative ~ uri.path)|trim('/') ~ '/task' ~ config.system.param_sep ~ 'login.logout', 'logout-form', 'logout-nonce')|e }}\">{{ 'PLUGIN_LOGIN.BTN_LOGOUT'|t }}</a>
    {% endif %}
</span>
", "partials/login-status.html.twig", "/Users/jamie/Documents/MAMProot/lucytumolo/user/plugins/login/templates/partials/login-status.html.twig");
    }
}
