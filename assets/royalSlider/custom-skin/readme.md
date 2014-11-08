<div class="article">
      <div><p>Skin is a CSS file with styled slider controls. You can find
existing skins by default in:<br></p>
<pre><code>wp-content/plugins/new-royalslider/lib/royalslider/skins</code>
</pre>
<p>To add your custom skin, you need to hook in
<code>new_royalslider_skins</code> and provide id, name and path to
skin.</p>
<p>For example:</p>
<pre><code>add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
      $skins['myCustomSkin'] = array(
           'label' =&gt; 'The custom skin',
           'path' =&gt; get_stylesheet_directory_uri() . '/some-path/my-custom-skin.css'  // get_stylesheet_directory_uri returns path to your theme folder
      );
      return $skins;
}</code>
</pre>
<p>Step by step instructions:</p>
<ol>
<li>Go to
<code>wp-content/plugins/new-royalslider/lib/royalslider/skins</code>.<br>
</li>
<li>Copy folder of the skin that you wish to clone and paste it to
another location. This can be a folder of your theme, or any other
place.<br></li>
<li>Rename folder that you moved e.g. to "my-custom-skin".<br></li>
<li>Go inside this folder and rename CSS file in to
<code>my-custom-skin.css</code>.<br></li>
<li>Open this CSS file. All CSS styles in it will start from
specific CSS class (e.g. <code>.rsDefault</code>, or
<code>.rsUni,</code> or <code>rsMinW</code> e.t.c), this is class
name and keyword of a skin. You should change all occurrences of it
to your skin keyword (e.g. to <code>.myCustomSkin</code>).<br></li>
<li>Add the PHP code above to your functions.php.
<code>myCustomSkin</code> part should match your CSS class, path
should point to the CSS file that you created.<br></li>
<li>Go to admin area and select your skin.<br></li>
<li>That's all. Now slider should have CSS class
<code>myCustomSkin</code> on it, and have all slider applied from
your custom <code>my-custom-skin.css</code>.</li>
</ol>
<h2>Adding multiple skins:</h2>
<pre><code>add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
      $skins['skin1'] = array(
           'label' =&gt; 'The custom skin 1',
           'path' =&gt; 'http://example.com/full-path-to-your-custom-skin-1.css'
      );
     $skins['skin2'] = array(
           'label' =&gt; 'The custom skin 2',
           'path' =&gt; 'http://example.com/full-path-to-your-custom-skin-2.css'
      );
      return $skins;
}</code>
</pre>
<p><br></p>
<p><em>I strongly recommend using this method and don't recommend
changing core code of slider, as you won't be able to easily
update.</em></p></div>
    </div>