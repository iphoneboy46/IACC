export default function Select2Module() {
  $(document).ready(function () {
    $(".select-1").select2({
      placeholder: "Loại công trình",
      // allowClear: true,
    });

    $(".select-actor").select2({});

    $(".select-year").select2({});

    $(".select2choose").each(function (i, v) {
      var placeholder = $(this).attr("data-placeholder");
      $(this).select2({
        width: '100%',
        placeholder: placeholder,
        dropdownCssClass: 'no-search'
      });
    });

    $(".recruit-search-select").each(function (i, v) {
      var placeholder = $(this).attr("data-placeholder");
      $(this).select2({
        width: '100%',
        placeholder: placeholder,
        // dropdownCssClass: 'my-class-dropdown'
      });
    });

  });
}
