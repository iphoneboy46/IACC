export default function Select2Module() {
  try {
    $(document).ready(function () {
      $(".select-1").select2({
        placeholder: "Loại công trình",
        // allowClear: true,
      });

      $(".select-actor").select2({});

      $(".select-year").select2({});

      $(".select2choose").each(function (i, v) {
        $(this).select2({});
      });

      $(".recruit-search-select").each(function (i, v) {
        var placeholder = $(this).attr("data-placeholder");
        $(this).select2({
          width: "100%",
          placeholder: placeholder,
          // dropdownCssClass: 'my-class-dropdown'
        });
      });
    });

    const filterPr = document.querySelector(".option-filter");

    if (filterPr) {
      $(".option-filter")
        .select2({})
        .data("select2")
        .$dropdown.addClass("filter-dropdown-menu");
    }
  } catch (error) {
    console.log(error);
  }
}
