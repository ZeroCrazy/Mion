<script>
(function ($) {
  $(document).ready(function() {
    window.index = lunr(function () {
      this.field('title', {boost: 10});
      this.field('body');
      this.ref('href');
      this.field('span');
    });
    window.index.pipeline.reset();
<?php $c_sql = mysql_query("SELECT * FROM click_comerciales"); while($c = mysql_fetch_assoc($c_sql)){ 
//$fecha_baja = new DateTime("". str_replace("/", "-", $c[fecha_baja]) ."");
//$fecha_alta = new DateTime("". str_replace("/", "-", $c[fecha_alta]) ."");
//$fecha_hoy = new DateTime("". date('d') . "-" . date('m') . "-" . date('Y') ."");
?>
    window.index.add({
      href: '<?php echo $config['site']; ?>/<a style="<?php if($c['fecha_baja'] == ''){ echo 'color: green;'; } else { echo 'color: red;'; } ?>" target="_blank" href="index.php?page=gerentes&edit_comercial=<?php echo $c['id']; ?>"><?php if($c['fecha_baja'] == ''){} else { ?><b title="Este comercial está dado de baja" style="color: red;">¡<?php echo $c['fecha_baja']; ?>!</b><?php } ?> <?php echo $c['nombre']; ?> <?php echo $c['primer_apellido']; ?> <?php echo $c['segundo_apellido']; ?> (<?php echo $c['subgerente']; ?>)',
	  span: 'nepe',
      title: '<?php echo $c['codigo_interno']; ?>',
      body: 'Created and designed by Google, Material Design is a design language that combines the classic principles of successful design along with innovation and technology. Google"s goal is to develop a system of design that allows for a unified user experience across all their products on any platform.'
    });
<?php } ?>

    // icon click
    $('ul#nav-mobile li.search .search-wrapper i.material-icons').click(function() {
      if ($('.search-results .focused').length) {
        $('.search-results .focused').first()[0].click();
      } else if ($('.search-results').children().length) {
        $('.search-results').children().first()[0].click();
      }
    });

    var renderResults = function(results) {
      var resultsContainer = $('.search-results');
      resultsContainer.empty();
      Array.prototype.forEach.call(results, function(result) {
        var resultDiv = $('<span>' + result[0] + '</span>');
        resultsContainer.append(resultDiv);
      });
    };

    var debounce = function (fn) {
      var timeout;
      return function () {
        var args = Array.prototype.slice.call(arguments),
            ctx = this;

        clearTimeout(timeout);
        timeout = setTimeout(function () {
          fn.apply(ctx, args);
        }, 100);
      };
    };

    $('input#search').focus(function() { $(this).parent().addClass('focused'); });
    $('input#search').blur(function() {
      if (!$(this).val()) {
        $(this).parent().removeClass('focused');
      }
    });

    $('input#search').on('keyup', debounce(function (e) {
      if ($(this).val() < 2) {
        renderResults([]);
        return;
      }

      if (e.which === 38 || e.which === 40 || e.keyCode === 13) return;

      var query = $(this).val();
      var results = window.index.search(query).slice(0, 6).map(function (result) {
        var href = result.ref.split('<?php echo $config['site']; ?>/')[1];
        return [href.charAt(0).toUpperCase() + href.slice(1), href];
      });
      renderResults(results);
    }));


    $('input#search').on('keydown', debounce(function (e) {
      // Escape.
      if (e.keyCode === 27) {
        $(this).val('');
        $(this).blur();
        renderResults([]);
        return;
      } else if (e.keyCode === 13) {
        // enter
        if ($('.search-results .focused').length) {
          $('.search-results .focused').first()[0].click();
        } else if ($('.search-results').children().length) {
          $('.search-results').children().first()[0].click();
        }
        return;
      }

      // Arrow keys.
      var focused;
      switch(e.which) {
        case 38: // up
          if ($('.search-results .focused').length) {
            focused = $('.search-results .focused');
            focused.removeClass('focused');
            focused.prev().addClass('focused');
          }
          break;

        case 40: // down
          if (!$('.search-results .focused').length) {
            focused = $('.search-results').children().first();
            focused.addClass('focused');
          } else {
            focused = $('.search-results .focused');
            if (focused.next().length) {
              focused.removeClass('focused');
              focused.next().addClass('focused');
            }
          }
          break;

        default: return; // exit this handler for other keys
      }
      e.preventDefault();
    }));



  });
}( jQuery ));

</script>