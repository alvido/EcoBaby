jQuery(function ($) {
  let canBeLoaded = true; // Переменная для предотвращения повторных запросов
  const button = $("#misha_loadmore");

  button.click(function () {
    if (!canBeLoaded) return;

    canBeLoaded = false;
    const data = {
      action: "loadmore",
      query: misha_loadmore_params.posts,
      page: misha_loadmore_params.cur_page, // Используем cur_page, а не current_page
    };

    $.ajax({
      url: misha_loadmore_params.ajaxurl,
      data: data,
      type: "POST",
      beforeSend: function (xhr) {
        button.addClass("loading");
      },
      success: function (data) {
        if (data) {
          $(".news__list").append(data); // Вставляем новые посты в конец списка
          button.removeClass("loading");
          misha_loadmore_params.cur_page++; // Увеличиваем номер текущей страницы

          if (
            misha_loadmore_params.cur_page >= misha_loadmore_params.max_page
          ) {
            button.remove();
          }
          canBeLoaded = true; // Разрешаем следующий запрос
        } else {
          button.remove();
        }
      },
    });
  });
});
