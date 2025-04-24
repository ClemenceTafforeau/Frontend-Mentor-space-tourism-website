<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Space Tourism API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-login">
                                <a href="#authentication-POSTapi-login">Handle an authentication attempt.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-GETapi-user">
                                <a href="#authentication-GETapi-user">Retrieve the authenticated user's profile.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-logout">
                                <a href="#authentication-POSTapi-logout">Log the authenticated user out.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-crew-members" class="tocify-header">
                <li class="tocify-item level-1" data-unique="crew-members">
                    <a href="#crew-members">Crew Members</a>
                </li>
                                    <ul id="tocify-subheader-crew-members" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="crew-members-GETapi-admin-crew">
                                <a href="#crew-members-GETapi-admin-crew">Retrieve a paginated list of crew members</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="crew-members-POSTapi-admin-crew">
                                <a href="#crew-members-POSTapi-admin-crew">Create a new crew member.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="crew-members-GETapi-admin-crew--id-">
                                <a href="#crew-members-GETapi-admin-crew--id-">Retrieve details of a specific crew member.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="crew-members-PUTapi-admin-crew--id-">
                                <a href="#crew-members-PUTapi-admin-crew--id-">Update an existing crew member.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="crew-members-DELETEapi-admin-crew--id-">
                                <a href="#crew-members-DELETEapi-admin-crew--id-">Delete a crew member.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="crew-members-GETapi-crew">
                                <a href="#crew-members-GETapi-crew">Retrieve all crew members.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-destinations" class="tocify-header">
                <li class="tocify-item level-1" data-unique="destinations">
                    <a href="#destinations">Destinations</a>
                </li>
                                    <ul id="tocify-subheader-destinations" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="destinations-GETapi-admin-destination">
                                <a href="#destinations-GETapi-admin-destination">Retrieve a paginated list of destinations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="destinations-POSTapi-admin-destination">
                                <a href="#destinations-POSTapi-admin-destination">Create a new destination.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="destinations-GETapi-admin-destination--id-">
                                <a href="#destinations-GETapi-admin-destination--id-">Retrieve details of a specific destination.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="destinations-PUTapi-admin-destination--id-">
                                <a href="#destinations-PUTapi-admin-destination--id-">Update an existing destination.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="destinations-DELETEapi-admin-destination--id-">
                                <a href="#destinations-DELETEapi-admin-destination--id-">Delete a destination.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="destinations-GETapi-destination">
                                <a href="#destinations-GETapi-destination">Retrieve all destinations.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-roles" class="tocify-header">
                <li class="tocify-item level-1" data-unique="roles">
                    <a href="#roles">Roles</a>
                </li>
                                    <ul id="tocify-subheader-roles" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="roles-GETapi-admin-roles">
                                <a href="#roles-GETapi-admin-roles">Retrieve available user roles.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-technologies" class="tocify-header">
                <li class="tocify-item level-1" data-unique="technologies">
                    <a href="#technologies">Technologies</a>
                </li>
                                    <ul id="tocify-subheader-technologies" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="technologies-GETapi-admin-technology">
                                <a href="#technologies-GETapi-admin-technology">Retrieve a paginated list of technologies</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="technologies-POSTapi-admin-technology">
                                <a href="#technologies-POSTapi-admin-technology">Create a new technology.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="technologies-GETapi-admin-technology--id-">
                                <a href="#technologies-GETapi-admin-technology--id-">Retrieve details of a specific technology.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="technologies-PUTapi-admin-technology--id-">
                                <a href="#technologies-PUTapi-admin-technology--id-">Update an existing technology.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="technologies-DELETEapi-admin-technology--id-">
                                <a href="#technologies-DELETEapi-admin-technology--id-">Delete a technology.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="technologies-GETapi-technology">
                                <a href="#technologies-GETapi-technology">Retrieve all technologies.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-users" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users">
                    <a href="#users">Users</a>
                </li>
                                    <ul id="tocify-subheader-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="users-GETapi-admin-user">
                                <a href="#users-GETapi-admin-user">Retrieve a paginated list of users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-POSTapi-admin-user">
                                <a href="#users-POSTapi-admin-user">Create a new user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-admin-user--id-">
                                <a href="#users-GETapi-admin-user--id-">Retrieve details of a specific user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-PUTapi-admin-user--id-">
                                <a href="#users-PUTapi-admin-user--id-">Update an existing user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-DELETEapi-admin-user--id-">
                                <a href="#users-DELETEapi-admin-user--id-">Delete a user.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 24, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>

        <h1 id="authentication">Authentication</h1>

    

                                <h2 id="authentication-POSTapi-login">Handle an authentication attempt.</h2>

<p>
</p>

<p>Authenticates a user using email and password. If successful, returns a new access token.</p>

<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"user@example.com\",
    \"password\": \"secret123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "user@example.com",
    "password": "secret123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Login successful.&quot;,
    &quot;token&quot;: &quot;1|vQ2mHWrXyUXYlvyoUreJ8vZFZ6aPzYv0w0...&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;The provided credentials do not match our records.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="user@example.com"
               data-component="body">
    <br>
<p>The user's email address. Example: <code>user@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="secret123"
               data-component="body">
    <br>
<p>The user's password. Example: <code>secret123</code></p>
        </div>
        </form>

                    <h2 id="authentication-GETapi-user">Retrieve the authenticated user&#039;s profile.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the currently logged-in user's information.</p>

<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/user" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;id&quot;: &quot;1&quot;
     &quot;first_name&quot;: &quot;Jody&quot;,
     &quot;last_name&quot;: &quot;Mante&quot;,
     &quot;email&quot;: &quot;jody.mante@example.com&quot;,
     &quot;email_verified_at&quot;: &quot;2025-04-23T19:49:55.000000Z&quot;,
     &quot;role&quot;: &quot;Admin&quot;,
     &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;deleted_at&quot;: null,
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-user"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-POSTapi-logout">Log the authenticated user out.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Revokes all access tokens for the authenticated user.</p>

<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Logout successful.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-logout"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="crew-members">Crew Members</h1>

    

                                <h2 id="crew-members-GETapi-admin-crew">Retrieve a paginated list of crew members</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admin-crew">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/crew?page=1&amp;per_page=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/crew"
);

const params = {
    "page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-crew">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;current page&quot;: 1
  &quot;data&quot;: [
  {
     &quot;id&quot;: &quot;1&quot;
     &quot;picture_webp&quot;: &quot;image-douglas-hurley.webp&quot;,
     &quot;picture_png&quot;: &quot;image-douglas-hurley.png&quot;,
     &quot;rank&quot;: &quot;Commander&quot;,
     &quot;first_name&quot;: &quot;Douglas&quot;,
     &quot;last_name&quot;: &quot;Hurley&quot;,
     &quot;biography&quot;: &quot;Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.&quot;,
     &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;deleted_at&quot;: null,
  },
  ],
  &quot;first_page_url&quot;: &quot;&quot;,
  &quot;from&quot;: 1,
  &quot;last_page&quot;: 1,
  &quot;last_page_url&quot;: ,
  &quot;links&quot;: [
     {
         &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
         &quot;active&quot;: false,
         &quot;url&quot;: null
     },
     ...
  ],
  &quot;next_page_url&quot;: null,
  &quot;path&quot;: &quot;&quot;,
  &quot;per_page&quot;: 10,
  &quot;prev_page_url&quot;: null,
  &quot;to&quot;: 5,
  &quot;total&quot;: 5
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-crew" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-crew"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-crew"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-crew" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-crew">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-crew" data-method="GET"
      data-path="api/admin/crew"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-crew', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-crew"
                    onclick="tryItOut('GETapi-admin-crew');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-crew"
                    onclick="cancelTryOut('GETapi-admin-crew');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-crew"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/crew</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-crew"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-crew"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-crew"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-admin-crew"
               value="1"
               data-component="query">
    <br>
<p>Page number for pagination. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-admin-crew"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="crew-members-POSTapi-admin-crew">Create a new crew member.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Requires valid crew member data in the request body.
The user must be authenticated via Sanctum.</p>

<span id="example-requests-POSTapi-admin-crew">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/crew" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"picture_webp\": \"image-douglas-hurley.webp\",
    \"picture_png\": \"image-douglas-hurley.png\",
    \"rank\": \"Commander\",
    \"first_name\": \"Douglas\",
    \"last_name\": \"Hurley\",
    \"biography\": \"Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/crew"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "picture_webp": "image-douglas-hurley.webp",
    "picture_png": "image-douglas-hurley.png",
    "rank": "Commander",
    "first_name": "Douglas",
    "last_name": "Hurley",
    "biography": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-admin-crew">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Crew member created successfully&quot;,
    &quot;crew&quot;: {
        &quot;rank&quot;: &quot;Commander&quot;,
        &quot;first_name&quot;: &quot;Douglas&quot;,
        &quot;last_name&quot;: &quot;Hurley&quot;,
        &quot;biography&quot;: &quot;Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.&quot;,
        &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
        &quot;id&quot;: &quot;5&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-admin-crew" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-crew"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-crew"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-crew" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-crew">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-crew" data-method="POST"
      data-path="api/admin/crew"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-crew', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-crew"
                    onclick="tryItOut('POSTapi-admin-crew');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-crew"
                    onclick="cancelTryOut('POSTapi-admin-crew');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-crew"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/crew</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-admin-crew"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-crew"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-crew"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_webp</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_webp"                data-endpoint="POSTapi-admin-crew"
               value="image-douglas-hurley.webp"
               data-component="body">
    <br>
<p>nullable The path to a picture of the crew member in webp format. Example: <code>image-douglas-hurley.webp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_png</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_png"                data-endpoint="POSTapi-admin-crew"
               value="image-douglas-hurley.png"
               data-component="body">
    <br>
<p>nullable The path to a picture of the crew member in png format. Example: <code>image-douglas-hurley.png</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rank</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="rank"                data-endpoint="POSTapi-admin-crew"
               value="Commander"
               data-component="body">
    <br>
<p>The rank of the crew member. Example: <code>Commander</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-admin-crew"
               value="Douglas"
               data-component="body">
    <br>
<p>The first name of the crew member. Example: <code>Douglas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-admin-crew"
               value="Hurley"
               data-component="body">
    <br>
<p>The last name of the crew member. Example: <code>Hurley</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>biography</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="biography"                data-endpoint="POSTapi-admin-crew"
               value="Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2."
               data-component="body">
    <br>
<p>The biography of the crew member. Example: <code>Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.</code></p>
        </div>
        </form>

                    <h2 id="crew-members-GETapi-admin-crew--id-">Retrieve details of a specific crew member.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admin-crew--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/crew/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/crew/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-crew--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;id&quot;: &quot;1&quot;
     &quot;picture_webp&quot;: &quot;image-douglas-hurley.webp&quot;,
     &quot;picture_png&quot;: &quot;image-douglas-hurley.png&quot;,
     &quot;rank&quot;: &quot;Commander&quot;,
     &quot;first_name&quot;: &quot;Douglas&quot;,
     &quot;last_name&quot;: &quot;Hurley&quot;,
     &quot;biography&quot;: &quot;Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.&quot;,
     &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;deleted_at&quot;: null,
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-crew--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-crew--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-crew--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-crew--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-crew--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-crew--id-" data-method="GET"
      data-path="api/admin/crew/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-crew--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-crew--id-"
                    onclick="tryItOut('GETapi-admin-crew--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-crew--id-"
                    onclick="cancelTryOut('GETapi-admin-crew--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-crew--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/crew/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-crew--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-crew--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-crew--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-crew--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the crew member. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="crew-members-PUTapi-admin-crew--id-">Update an existing crew member.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-admin-crew--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/crew/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"picture_webp\": \"image-douglas-hurley.webp\",
    \"picture_png\": \"image-douglas-hurley.png\",
    \"rank\": \"Commander\",
    \"first_name\": \"Douglas\",
    \"last_name\": \"Hurley\",
    \"biography\": \"Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/crew/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "picture_webp": "image-douglas-hurley.webp",
    "picture_png": "image-douglas-hurley.png",
    "rank": "Commander",
    "first_name": "Douglas",
    "last_name": "Hurley",
    "biography": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-crew--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;message&quot;: &quot;Crew member updated successfully&quot;,
     &quot;crew&quot;: {
         &quot;rank&quot;: &quot;Commander&quot;,
         &quot;first_name&quot;: &quot;Douglas&quot;,
         &quot;last_name&quot;: &quot;Hurley&quot;,
         &quot;biography&quot;: &quot;Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.&quot;,
         &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;id&quot;: &quot;5&quot;
     }
}
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-admin-crew--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-crew--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-crew--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-crew--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-crew--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-crew--id-" data-method="PUT"
      data-path="api/admin/crew/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-crew--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-crew--id-"
                    onclick="tryItOut('PUTapi-admin-crew--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-crew--id-"
                    onclick="cancelTryOut('PUTapi-admin-crew--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-crew--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/crew/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/crew/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-admin-crew--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-crew--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-crew--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-crew--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the crew member. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_webp</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_webp"                data-endpoint="PUTapi-admin-crew--id-"
               value="image-douglas-hurley.webp"
               data-component="body">
    <br>
<p>nullable The path to a picture of the crew member in webp format. Example: <code>image-douglas-hurley.webp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_png</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_png"                data-endpoint="PUTapi-admin-crew--id-"
               value="image-douglas-hurley.png"
               data-component="body">
    <br>
<p>nullable The path to a picture of the crew member in png format. Example: <code>image-douglas-hurley.png</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rank</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="rank"                data-endpoint="PUTapi-admin-crew--id-"
               value="Commander"
               data-component="body">
    <br>
<p>The rank of the crew member. Example: <code>Commander</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTapi-admin-crew--id-"
               value="Douglas"
               data-component="body">
    <br>
<p>The first name of the crew member. Example: <code>Douglas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTapi-admin-crew--id-"
               value="Hurley"
               data-component="body">
    <br>
<p>The last name of the crew member. Example: <code>Hurley</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>biography</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="biography"                data-endpoint="PUTapi-admin-crew--id-"
               value="Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2."
               data-component="body">
    <br>
<p>The biography of the crew member. Example: <code>Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.</code></p>
        </div>
        </form>

                    <h2 id="crew-members-DELETEapi-admin-crew--id-">Delete a crew member.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-admin-crew--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/crew/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/crew/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-crew--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Crew member deleted successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-admin-crew--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-crew--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-crew--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-crew--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-crew--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-crew--id-" data-method="DELETE"
      data-path="api/admin/crew/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-crew--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-crew--id-"
                    onclick="tryItOut('DELETEapi-admin-crew--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-crew--id-"
                    onclick="cancelTryOut('DELETEapi-admin-crew--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-crew--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/crew/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-admin-crew--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-crew--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-crew--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-crew--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the crew member. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="crew-members-GETapi-crew">Retrieve all crew members.</h2>

<p>
</p>

<p>Returns the full list of crew members without pagination.</p>

<span id="example-requests-GETapi-crew">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/crew" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/crew"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-crew">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
  {
     &quot;id&quot;: &quot;1&quot;
     &quot;picture_webp&quot;: &quot;image-douglas-hurley.webp&quot;,
     &quot;picture_png&quot;: &quot;image-douglas-hurley.png&quot;,
     &quot;rank&quot;: &quot;Commander&quot;,
     &quot;first_name&quot;: &quot;Douglas&quot;,
     &quot;last_name&quot;: &quot;Hurley&quot;,
     &quot;biography&quot;: &quot;Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.&quot;,
     &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;deleted_at&quot;: null,
  },
  ...
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-crew" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-crew"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-crew"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-crew" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-crew">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-crew" data-method="GET"
      data-path="api/crew"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-crew', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-crew"
                    onclick="tryItOut('GETapi-crew');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-crew"
                    onclick="cancelTryOut('GETapi-crew');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-crew"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/crew</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-crew"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-crew"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="destinations">Destinations</h1>

    

                                <h2 id="destinations-GETapi-admin-destination">Retrieve a paginated list of destinations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admin-destination">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/destination?page=1&amp;per_page=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/destination"
);

const params = {
    "page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-destination">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;current page&quot;: 1
  &quot;data&quot;: [
  {
       &quot;id&quot;: &quot;1&quot;
       &quot;picture_webp&quot;: &quot;image-moon.webp&quot;,
       &quot;picture_png&quot;: &quot;image-moon.png&quot;,
       &quot;name&quot;: &quot;Moon&quot;,
       &quot;description&quot;: &quot;See our planet as you&rsquo;ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you&rsquo;re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.&quot;,
       &quot;distance&quot;: 384400,
       &quot;ett&quot;: 3,
       &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
       &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
       &quot;deleted_at&quot;: null,
  },
  ],
  &quot;first_page_url&quot;: &quot;&quot;,
  &quot;from&quot;: 1,
  &quot;last_page&quot;: 1,
  &quot;last_page_url&quot;: &quot;&quot;,
  &quot;links&quot;: [
     {
         &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
         &quot;active&quot;: false,
         &quot;url&quot;: null
     },
     ...
  ],
  &quot;next_page_url&quot;: null,
  &quot;path&quot;: &quot;&quot;,
  &quot;per_page&quot;: 10,
  &quot;prev_page_url&quot;: null,
  &quot;to&quot;: 5,
  &quot;total&quot;: 5
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-destination" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-destination"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-destination"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-destination" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-destination">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-destination" data-method="GET"
      data-path="api/admin/destination"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-destination', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-destination"
                    onclick="tryItOut('GETapi-admin-destination');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-destination"
                    onclick="cancelTryOut('GETapi-admin-destination');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-destination"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/destination</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-destination"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-destination"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-destination"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-admin-destination"
               value="1"
               data-component="query">
    <br>
<p>Page number for pagination. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-admin-destination"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="destinations-POSTapi-admin-destination">Create a new destination.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Requires valid destination data in the request body.
The user must be authenticated via Sanctum.</p>

<span id="example-requests-POSTapi-admin-destination">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/destination" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"picture_webp\": \"image-moon.webp\",
    \"picture_png\": \"image-moon.png\",
    \"name\": \"Moon\",
    \"description\": \"See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.\",
    \"distance\": 384400,
    \"ett\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/destination"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "picture_webp": "image-moon.webp",
    "picture_png": "image-moon.png",
    "name": "Moon",
    "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
    "distance": 384400,
    "ett": 3
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-admin-destination">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Destination created successfully&quot;,
    &quot;destination&quot;: {
        &quot;name&quot;: &quot;Moon&quot;,
        &quot;description&quot;: &quot;See our planet as you&rsquo;ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you&rsquo;re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.&quot;,
        &quot;distance&quot;: &quot;384400&quot;,
        &quot;ett&quot;: &quot;3&quot;,
        &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
        &quot;id&quot;: &quot;5&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-admin-destination" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-destination"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-destination"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-destination" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-destination">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-destination" data-method="POST"
      data-path="api/admin/destination"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-destination', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-destination"
                    onclick="tryItOut('POSTapi-admin-destination');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-destination"
                    onclick="cancelTryOut('POSTapi-admin-destination');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-destination"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/destination</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-admin-destination"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-destination"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-destination"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_webp</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_webp"                data-endpoint="POSTapi-admin-destination"
               value="image-moon.webp"
               data-component="body">
    <br>
<p>nullable The path to a picture of the destination in webp format. Example: <code>image-moon.webp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_png</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_png"                data-endpoint="POSTapi-admin-destination"
               value="image-moon.png"
               data-component="body">
    <br>
<p>nullable The path to a picture of the destination in png format. Example: <code>image-moon.png</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-admin-destination"
               value="Moon"
               data-component="body">
    <br>
<p>The name of the destination. Example: <code>Moon</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-admin-destination"
               value="See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites."
               data-component="body">
    <br>
<p>A description of the destination. Example: <code>See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>distance</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="distance"                data-endpoint="POSTapi-admin-destination"
               value="384400"
               data-component="body">
    <br>
<p>The distance from Earth to the destination (in kilometers). Example: <code>384400</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ett</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="ett"                data-endpoint="POSTapi-admin-destination"
               value="3"
               data-component="body">
    <br>
<p>The estimated travel time (in days). Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="destinations-GETapi-admin-destination--id-">Retrieve details of a specific destination.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admin-destination--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/destination/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/destination/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-destination--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;id&quot;: &quot;1&quot;
     &quot;picture_webp&quot;: &quot;image-moon.webp&quot;,
     &quot;picture_png&quot;: &quot;image-moon.png&quot;,
     &quot;name&quot;: &quot;Moon&quot;,
     &quot;description&quot;: &quot;See our planet as you&rsquo;ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you&rsquo;re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.&quot;,
     &quot;distance&quot;: 384400,
     &quot;ett&quot;: 3,
     &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;deleted_at&quot;: null,
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-destination--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-destination--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-destination--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-destination--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-destination--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-destination--id-" data-method="GET"
      data-path="api/admin/destination/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-destination--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-destination--id-"
                    onclick="tryItOut('GETapi-admin-destination--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-destination--id-"
                    onclick="cancelTryOut('GETapi-admin-destination--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-destination--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/destination/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-destination--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-destination--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-destination--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-destination--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the destination. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="destinations-PUTapi-admin-destination--id-">Update an existing destination.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-admin-destination--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/destination/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"picture_webp\": \"image-moon.webp\",
    \"picture_png\": \"image-moon.png\",
    \"name\": \"Moon\",
    \"description\": \"See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.\",
    \"distance\": 384400,
    \"ett\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/destination/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "picture_webp": "image-moon.webp",
    "picture_png": "image-moon.png",
    "name": "Moon",
    "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
    "distance": 384400,
    "ett": 3
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-destination--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;message&quot;: &quot;Destination updated successfully&quot;,
     &quot;destination&quot;: {
         &quot;name&quot;: &quot;Moon&quot;,
         &quot;description&quot;: &quot;See our planet as you&rsquo;ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you&rsquo;re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.&quot;,
         &quot;distance&quot;: &quot;384400&quot;,
         &quot;ett&quot;: &quot;3&quot;,
         &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;id&quot;: &quot;5&quot;
     }
}
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-admin-destination--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-destination--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-destination--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-destination--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-destination--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-destination--id-" data-method="PUT"
      data-path="api/admin/destination/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-destination--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-destination--id-"
                    onclick="tryItOut('PUTapi-admin-destination--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-destination--id-"
                    onclick="cancelTryOut('PUTapi-admin-destination--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-destination--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/destination/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/destination/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-admin-destination--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-destination--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-destination--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-destination--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the destination. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_webp</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_webp"                data-endpoint="PUTapi-admin-destination--id-"
               value="image-moon.webp"
               data-component="body">
    <br>
<p>nullable The path to a picture of the destination in webp format. Example: <code>image-moon.webp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_png</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_png"                data-endpoint="PUTapi-admin-destination--id-"
               value="image-moon.png"
               data-component="body">
    <br>
<p>nullable The path to a picture of the destination in png format. Example: <code>image-moon.png</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-admin-destination--id-"
               value="Moon"
               data-component="body">
    <br>
<p>The name of the destination. Example: <code>Moon</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-admin-destination--id-"
               value="See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites."
               data-component="body">
    <br>
<p>A description of the technology. Example: <code>See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>distance</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="distance"                data-endpoint="PUTapi-admin-destination--id-"
               value="384400"
               data-component="body">
    <br>
<p>The distance from Earth to the destination (in kilometers). Example: <code>384400</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ett</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="ett"                data-endpoint="PUTapi-admin-destination--id-"
               value="3"
               data-component="body">
    <br>
<p>The estimated travel time (in days). Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="destinations-DELETEapi-admin-destination--id-">Delete a destination.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-admin-destination--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/destination/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/destination/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-destination--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Destination deleted successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-admin-destination--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-destination--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-destination--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-destination--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-destination--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-destination--id-" data-method="DELETE"
      data-path="api/admin/destination/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-destination--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-destination--id-"
                    onclick="tryItOut('DELETEapi-admin-destination--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-destination--id-"
                    onclick="cancelTryOut('DELETEapi-admin-destination--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-destination--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/destination/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-admin-destination--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-destination--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-destination--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-destination--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the destination. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="destinations-GETapi-destination">Retrieve all destinations.</h2>

<p>
</p>

<p>Returns the full list of destinations without pagination.</p>

<span id="example-requests-GETapi-destination">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/destination" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/destination"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-destination">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
  {
     &quot;id&quot;: &quot;1&quot;
     &quot;picture_webp&quot;: &quot;image-moon.webp&quot;,
     &quot;picture_png&quot;: &quot;image-moon.png&quot;,
     &quot;name&quot;: &quot;Moon&quot;,
     &quot;description&quot;: &quot;See our planet as you&rsquo;ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you&rsquo;re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.&quot;,
     &quot;distance&quot;: 384400,
     &quot;ett&quot;: 3,
     &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;deleted_at&quot;: null,
  },
  ...
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-destination" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-destination"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-destination"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-destination" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-destination">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-destination" data-method="GET"
      data-path="api/destination"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-destination', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-destination"
                    onclick="tryItOut('GETapi-destination');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-destination"
                    onclick="cancelTryOut('GETapi-destination');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-destination"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/destination</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-destination"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-destination"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="roles">Roles</h1>

    

                                <h2 id="roles-GETapi-admin-roles">Retrieve available user roles.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a list of all possible roles defined in the system.</p>

<span id="example-requests-GETapi-admin-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/roles" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/roles"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-roles">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;roles&quot;: [
        &quot;Admin&quot;,
        &quot;Travel agent&quot;,
        &quot;User&quot;
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-roles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-roles" data-method="GET"
      data-path="api/admin/roles"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-roles"
                    onclick="tryItOut('GETapi-admin-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-roles"
                    onclick="cancelTryOut('GETapi-admin-roles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-roles"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="technologies">Technologies</h1>

    

                                <h2 id="technologies-GETapi-admin-technology">Retrieve a paginated list of technologies</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admin-technology">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/technology?page=1&amp;per_page=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/technology"
);

const params = {
    "page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-technology">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;current page&quot;: 1
  &quot;data&quot;: [
     {
         &quot;id&quot;: &quot;1&quot;
         &quot;picture_portrait&quot;: &quot;image-launch-vehicle-portrait.jpg&quot;,
         &quot;picture_landscape&quot;: &quot;image-launch-vehicle-landscape.jpg&quot;,
         &quot;name&quot;: &quot;Launch vehicle&quot;,
         &quot;description&quot;: &quot;A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth&#039;s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it&#039;s quite an awe-inspiring sight on the launch pad!&quot;,
         &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;deleted_at&quot;: null,
     },
  ],
  &quot;first_page_url&quot;: &quot;&quot;,
  &quot;from&quot;: 1,
  &quot;last_page&quot;: 1,
  &quot;last_page_url&quot;: &quot;&quot;,
  &quot;links&quot;: [
     {
         &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
         &quot;active&quot;: false,
         &quot;url&quot;: null
     },
     ...
  ],
  &quot;next_page_url&quot;: null,
  &quot;path&quot;: &quot;&quot;,
  &quot;per_page&quot;: 10,
  &quot;prev_page_url&quot;: null,
  &quot;to&quot;: 5,
  &quot;total&quot;: 5
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-technology" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-technology"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-technology"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-technology" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-technology">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-technology" data-method="GET"
      data-path="api/admin/technology"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-technology', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-technology"
                    onclick="tryItOut('GETapi-admin-technology');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-technology"
                    onclick="cancelTryOut('GETapi-admin-technology');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-technology"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/technology</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-technology"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-technology"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-technology"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-admin-technology"
               value="1"
               data-component="query">
    <br>
<p>Page number for pagination. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-admin-technology"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="technologies-POSTapi-admin-technology">Create a new technology.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Requires valid technology data in the request body.
The user must be authenticated via Sanctum.</p>

<span id="example-requests-POSTapi-admin-technology">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/technology" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"picture_portrait\": \"image-launch-vehicle-portrait.jpg\",
    \"picture_landscape\": \"image-launch-vehicle-landscape.jpg\",
    \"name\": \"Launch vehicle\",
    \"description\": \"A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth\'s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it\'s quite an awe-inspiring sight on the launch pad!\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/technology"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "picture_portrait": "image-launch-vehicle-portrait.jpg",
    "picture_landscape": "image-launch-vehicle-landscape.jpg",
    "name": "Launch vehicle",
    "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-admin-technology">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Technology created successfully&quot;,
    &quot;technology&quot;: {
        &quot;name&quot;: &quot;Launch vehicle&quot;,
        &quot;description&quot;: &quot;A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth&#039;s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it&#039;s quite an awe-inspiring sight on the launch pad!&quot;,
        &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
        &quot;id&quot;: &quot;5&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-admin-technology" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-technology"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-technology"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-technology" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-technology">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-technology" data-method="POST"
      data-path="api/admin/technology"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-technology', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-technology"
                    onclick="tryItOut('POSTapi-admin-technology');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-technology"
                    onclick="cancelTryOut('POSTapi-admin-technology');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-technology"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/technology</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-admin-technology"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-technology"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-technology"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_portrait</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_portrait"                data-endpoint="POSTapi-admin-technology"
               value="image-launch-vehicle-portrait.jpg"
               data-component="body">
    <br>
<p>nullable The path to a picture of the destination in webp format. Example: <code>image-launch-vehicle-portrait.jpg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_landscape</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_landscape"                data-endpoint="POSTapi-admin-technology"
               value="image-launch-vehicle-landscape.jpg"
               data-component="body">
    <br>
<p>nullable The path to a picture of the destination in png format. Example: <code>image-launch-vehicle-landscape.jpg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-admin-technology"
               value="Launch vehicle"
               data-component="body">
    <br>
<p>The name of the technology. Example: <code>Launch vehicle</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-admin-technology"
               value="A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!"
               data-component="body">
    <br>
<p>A description of the technology. Example: <code>A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!</code></p>
        </div>
        </form>

                    <h2 id="technologies-GETapi-admin-technology--id-">Retrieve details of a specific technology.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admin-technology--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/technology/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/technology/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-technology--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;id&quot;: &quot;1&quot;
     &quot;picture_portrait&quot;: &quot;image-launch-vehicle-portrait.jpg&quot;,
     &quot;picture_landscape&quot;: &quot;image-launch-vehicle-landscape.jpg&quot;,
     &quot;name&quot;: &quot;Launch vehicle&quot;,
     &quot;description&quot;: &quot;A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth&#039;s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it&#039;s quite an awe-inspiring sight on the launch pad!&quot;,
     &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;deleted_at&quot;: null,
},</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-technology--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-technology--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-technology--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-technology--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-technology--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-technology--id-" data-method="GET"
      data-path="api/admin/technology/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-technology--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-technology--id-"
                    onclick="tryItOut('GETapi-admin-technology--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-technology--id-"
                    onclick="cancelTryOut('GETapi-admin-technology--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-technology--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/technology/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-technology--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-technology--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-technology--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-technology--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the technology. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="technologies-PUTapi-admin-technology--id-">Update an existing technology.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-admin-technology--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/technology/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"picture_portrait\": \"image-launch-vehicle-portrait.jpg\",
    \"picture_landscape\": \"image-launch-vehicle-landscape.jpg\",
    \"name\": \"Launch vehicle\",
    \"description\": \"A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth\'s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it\'s quite an awe-inspiring sight on the launch pad!\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/technology/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "picture_portrait": "image-launch-vehicle-portrait.jpg",
    "picture_landscape": "image-launch-vehicle-landscape.jpg",
    "name": "Launch vehicle",
    "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-technology--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;message&quot;: &quot;Technology updated successfully&quot;,
     &quot;technology&quot;: {
         &quot;name&quot;: &quot;Launch vehicle&quot;,
         &quot;description&quot;: &quot;A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth&#039;s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it&#039;s quite an awe-inspiring sight on the launch pad!&quot;,
         &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;id&quot;: &quot;5&quot;
     }
}
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-admin-technology--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-technology--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-technology--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-technology--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-technology--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-technology--id-" data-method="PUT"
      data-path="api/admin/technology/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-technology--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-technology--id-"
                    onclick="tryItOut('PUTapi-admin-technology--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-technology--id-"
                    onclick="cancelTryOut('PUTapi-admin-technology--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-technology--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/technology/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/technology/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-admin-technology--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-technology--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-technology--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-technology--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the technology. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_portrait</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_portrait"                data-endpoint="PUTapi-admin-technology--id-"
               value="image-launch-vehicle-portrait.jpg"
               data-component="body">
    <br>
<p>nullable The path to a picture of the destination in webp format. Example: <code>image-launch-vehicle-portrait.jpg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture_landscape</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture_landscape"                data-endpoint="PUTapi-admin-technology--id-"
               value="image-launch-vehicle-landscape.jpg"
               data-component="body">
    <br>
<p>nullable The path to a picture of the destination in png format. Example: <code>image-launch-vehicle-landscape.jpg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-admin-technology--id-"
               value="Launch vehicle"
               data-component="body">
    <br>
<p>The name of the technology. Example: <code>Launch vehicle</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-admin-technology--id-"
               value="A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!"
               data-component="body">
    <br>
<p>A description of the technology. Example: <code>A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!</code></p>
        </div>
        </form>

                    <h2 id="technologies-DELETEapi-admin-technology--id-">Delete a technology.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-admin-technology--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/technology/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/technology/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-technology--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Technology deleted successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-admin-technology--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-technology--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-technology--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-technology--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-technology--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-technology--id-" data-method="DELETE"
      data-path="api/admin/technology/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-technology--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-technology--id-"
                    onclick="tryItOut('DELETEapi-admin-technology--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-technology--id-"
                    onclick="cancelTryOut('DELETEapi-admin-technology--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-technology--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/technology/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-admin-technology--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-technology--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-technology--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-technology--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the technology. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="technologies-GETapi-technology">Retrieve all technologies.</h2>

<p>
</p>

<p>Returns the full list of technologies without pagination.</p>

<span id="example-requests-GETapi-technology">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/technology" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/technology"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-technology">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
  {
     &quot;id&quot;: &quot;1&quot;
     &quot;picture_portrait&quot;: &quot;image-launch-vehicle-portrait.jpg&quot;,
     &quot;picture_landscape&quot;: &quot;image-launch-vehicle-landscape.jpg&quot;,
     &quot;name&quot;: &quot;Launch vehicle&quot;,
     &quot;description&quot;: &quot;A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth&#039;s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it&#039;s quite an awe-inspiring sight on the launch pad!&quot;,
     &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
     &quot;deleted_at&quot;: null,
  },
  ...
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-technology" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-technology"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-technology"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-technology" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-technology">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-technology" data-method="GET"
      data-path="api/technology"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-technology', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-technology"
                    onclick="tryItOut('GETapi-technology');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-technology"
                    onclick="cancelTryOut('GETapi-technology');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-technology"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/technology</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-technology"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-technology"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="users">Users</h1>

    

                                <h2 id="users-GETapi-admin-user">Retrieve a paginated list of users</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admin-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/user?page=1&amp;per_page=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/user"
);

const params = {
    "page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;current page&quot;: 1
  &quot;data&quot;: [
     {
         &quot;id&quot;: &quot;1&quot;
         &quot;first_name&quot;: &quot;Jody&quot;,
         &quot;last_name&quot;: &quot;Mante&quot;,
         &quot;email&quot;: &quot;jody.mante@example.com&quot;,
         &quot;email_verified_at&quot;: &quot;2025-04-23T19:49:55.000000Z&quot;,
         &quot;role&quot;: &quot;Admin&quot;,
         &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;deleted_at&quot;: null,
     },
  ],
  &quot;first_page_url&quot;: &quot;&quot;,
  &quot;from&quot;: 1,
  &quot;last_page&quot;: 1,
  &quot;last_page_url&quot;: ,
  &quot;links&quot;: [
     {
         &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
         &quot;active&quot;: false,
         &quot;url&quot;: null
     },
     ...
  ],
  &quot;next_page_url&quot;: null,
  &quot;path&quot;: &quot;&quot;,
  &quot;per_page&quot;: 10,
  &quot;prev_page_url&quot;: null,
  &quot;to&quot;: 5,
  &quot;total&quot;: 5
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-user" data-method="GET"
      data-path="api/admin/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-user"
                    onclick="tryItOut('GETapi-admin-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-user"
                    onclick="cancelTryOut('GETapi-admin-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-user"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-admin-user"
               value="1"
               data-component="query">
    <br>
<p>Page number for pagination. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-admin-user"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="users-POSTapi-admin-user">Create a new user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Requires valid user data in the request body.
The user must be authenticated via Sanctum.</p>

<span id="example-requests-POSTapi-admin-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/user" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"John\",
    \"last_name\": \"Doe\",
    \"email\": \"john.doe@example.com\",
    \"password\": \"password123\",
    \"role\": \"Admin\",
    \"password_confirmation\": \"password123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/user"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "email": "john.doe@example.com",
    "password": "password123",
    "role": "Admin",
    "password_confirmation": "password123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-admin-user">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;User created successfully&quot;,
    &quot;user&quot;: {
        &quot;first_name&quot;: &quot;John&quot;,
        &quot;last_name&quot;: &quot;Doe&quot;,
        &quot;email&quot;: &quot;john.doe@example.com&quot;,
        &quot;role&quot;: &quot;Admin&quot;,
        &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
        &quot;id&quot;: &quot;5&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-admin-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-user" data-method="POST"
      data-path="api/admin/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-user"
                    onclick="tryItOut('POSTapi-admin-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-user"
                    onclick="cancelTryOut('POSTapi-admin-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-admin-user"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-admin-user"
               value="John"
               data-component="body">
    <br>
<p>The first name of the user. Example: <code>John</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-admin-user"
               value="Doe"
               data-component="body">
    <br>
<p>The last name of the user. Example: <code>Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-admin-user"
               value="john.doe@example.com"
               data-component="body">
    <br>
<p>The email address of the user. Example: <code>john.doe@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-admin-user"
               value="password123"
               data-component="body">
    <br>
<p>The password of the user. Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="POSTapi-admin-user"
               value="Admin"
               data-component="body">
    <br>
<p>The role of the user. Example: <code>Admin</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-admin-user"
               value="password123"
               data-component="body">
    <br>
<p>The password of the user (has to match the first password field). Example: <code>password123</code></p>
        </div>
        </form>

                    <h2 id="users-GETapi-admin-user--id-">Retrieve details of a specific user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admin-user--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/user/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/user/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-user--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: &quot;1&quot;
    &quot;first_name&quot;: &quot;Jody&quot;,
    &quot;last_name&quot;: &quot;Mante&quot;,
    &quot;email&quot;: &quot;jody.mante@example.com&quot;,
    &quot;email_verified_at&quot;: &quot;2025-04-23T19:49:55.000000Z&quot;,
    &quot;role&quot;: &quot;Admin&quot;,
    &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
    &quot;deleted_at&quot;: null,
},</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-user--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-user--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-user--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-user--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-user--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-user--id-" data-method="GET"
      data-path="api/admin/user/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-user--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-user--id-"
                    onclick="tryItOut('GETapi-admin-user--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-user--id-"
                    onclick="cancelTryOut('GETapi-admin-user--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-user--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admin-user--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-user--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-user--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-user--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="users-PUTapi-admin-user--id-">Update an existing user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-admin-user--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/user/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"John\",
    \"last_name\": \"Doe\",
    \"email\": \"john.doe@example.com\",
    \"password\": \"password123\",
    \"password_confirmation\": \"password123\",
    \"role\": \"Admin\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/user/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "email": "john.doe@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "role": "Admin"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-user--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;message&quot;: &quot;User updated successfully&quot;,
     &quot;user&quot;: {
         &quot;first_name&quot;: &quot;John&quot;,
         &quot;last_name&quot;: &quot;Doe&quot;,
         &quot;email&quot;: &quot;john.doe@example.com&quot;,
         &quot;role&quot;: &quot;Admin&quot;,
         &quot;updated_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;created_at&quot;: &quot;2025-04-24T08:39:31.000000Z&quot;,
         &quot;id&quot;: &quot;5&quot;
     }
}
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-admin-user--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-user--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-user--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-user--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-user--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-user--id-" data-method="PUT"
      data-path="api/admin/user/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-user--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-user--id-"
                    onclick="tryItOut('PUTapi-admin-user--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-user--id-"
                    onclick="cancelTryOut('PUTapi-admin-user--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-user--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/user/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-admin-user--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-user--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-user--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-user--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTapi-admin-user--id-"
               value="John"
               data-component="body">
    <br>
<p>The first name of the user. Example: <code>John</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTapi-admin-user--id-"
               value="Doe"
               data-component="body">
    <br>
<p>The last name of the user. Example: <code>Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-admin-user--id-"
               value="john.doe@example.com"
               data-component="body">
    <br>
<p>The email address of the user. Example: <code>john.doe@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTapi-admin-user--id-"
               value="password123"
               data-component="body">
    <br>
<p>The password of the user. Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="PUTapi-admin-user--id-"
               value="password123"
               data-component="body">
    <br>
<p>The password of the user (has to match the first password field). Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="PUTapi-admin-user--id-"
               value="Admin"
               data-component="body">
    <br>
<p>The role of the user. Example: <code>Admin</code></p>
        </div>
        </form>

                    <h2 id="users-DELETEapi-admin-user--id-">Delete a user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-admin-user--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/user/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/user/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-user--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;User deleted successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-admin-user--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-user--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-user--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-user--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-user--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-user--id-" data-method="DELETE"
      data-path="api/admin/user/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-user--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-user--id-"
                    onclick="tryItOut('DELETEapi-admin-user--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-user--id-"
                    onclick="cancelTryOut('DELETEapi-admin-user--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-user--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-admin-user--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-user--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-user--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-user--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
