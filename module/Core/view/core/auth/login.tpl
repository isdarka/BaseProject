<div class="container">
	<form class="form-signin validates" method="post" action="{$baseUrl}/core/auth/auth" role="form">
    	<h2 class="form-signin-heading">{$i18n->translate("Login")}</h2>
        <input type="text" name="username" class="form-control required" placeholder="{$i18n->translate("Username")}"  autofocus>
        <input type="password" name="password" class="form-control required" placeholder="{$i18n->translate("Password")}">
        <label class="checkbox">
          <input type="checkbox" name="rememberMe" value="1"> {$i18n->translate("Remember me")}
        </label>        
        <button class="btn btn-lg btn-primary btn-block" type="submit">{$i18n->translate("Sign in")}</button>
        
      </form>

    </div>