$().ready(function () {
  $("#product_form").validate({
    rules: {
      sku: {
        required: true,
      },
      name: {
        required: true,
      },
      price: {
        required: true,
        number: true,
        min: 0.01,
      },
      productType: {
        required: true,
      },
      // Attributes Validation
      size: {
        required: true,
      },
      height: {
        required: true,
      },
      width: {
        required: true,
      },
      length: {
        required: true,
      },
      weight: {
        required: true,
      },
    },

    messages: {
      sku: {
        required: "Please, submit Product SKU",
      },
      name: {
        required: "Please, submit Product name",
      },
      price: {
        required: "Please, submit Product price",
      },
      productType: {
        required: "Please, select Product type",
      },
      // Attributes Validation
      size: {
        required: "Please, submit Product size",
      },
      height: {
        required: "Please, submit Product height",
      },
      width: {
        required: "Please, submit Product width",
      },
      length: {
        required: "Please, submit Product length",
      },
      weight: {
        required: "Please, submit Product weight",
      },
    },
  });
});
