<!DOCTYPE html>
<html lang="en">

<head>
  <title>Trang chủ</title>
  <?php require('head.php') ?>
</head>

<body>
  <?php require('header/header.php') ?>
  <div class="content">
    <?php require('./aside/aside.php') ?>

    <div id="main-content">
      <!-- dynamic content loading -->
    </div>
  </div>
</body>

</html>
<script>
  async function loadContent(page, id) {
    try {
      const url = 'load_content.php?page=' + page + (id !== undefined ? '&id=' + id : '');
      const response = await fetch(url);
      if (response.ok) {
        const content = await response.text();
        document.getElementById('main-content').innerHTML = content;
        const newUrl = '?page=' + page + (id !== undefined ? '&id=' + id : '');
        history.pushState({
          page: page,
          id: id
        }, '', newUrl);
      } else {
        document.getElementById('main-content').innerHTML = '<p>Error loading page</p>';
      }
    } catch (error) {
      document.getElementById('main-content').innerHTML = '<p>Error loading page</p>';
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.children a').forEach(link => {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        loadContent(this.getAttribute('data-page'));
      });
    });

    // Load the initial content based on the URL query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page');
    if (page) {
      loadContent(page);
    }

    // Handle back/forward navigation
    window.addEventListener('popstate', function(event) {
      if (event.state && event.state.page) {
        loadContent(event.state.page);
      }
    });
  });
</script>
<!-- Notify deleting a member -->
<script src="./member/delete.js"></script>
<!-- Open menus -->
<script src="./header/openMenu.js"></script>