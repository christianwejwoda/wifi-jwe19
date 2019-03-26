<nav id="main">
    <input type="checkbox" id="nav-btn">
    <span id="nav-btn-open">+</span>
    <span id="nav-btn-close">x</span>

    <ul>
      <?php
        $menu_items = array(
          "about_us" => "Über uns",
          "wir-ueber-uns" => "Unser Team",
          "gallery" => "Galerie",
          "contact" => "Kontakt"
        );

        foreach ($menu_items as $url_part => $menu_item) {
          echo '<li>
                  <a ' . ($page == $url_part ? 'class="active"' : '') . ' href="'. htmlspecialchars($url_part) .'">' . htmlspecialchars($menu_item) . '</a>
                </li>';
        }
       ?>

    </ul>
</nav>
