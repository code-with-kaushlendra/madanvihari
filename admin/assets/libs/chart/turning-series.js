$(function () {
  var datasets = {
    eastDelhi: {
      label: "East-Delhi",
      data: [
        [0, 48],
        [1, 47],
        [2, 45],
        [3, 40],
        [4, 42],
        [5, 40],
        [6, 37],
        [7, 35],
        [8, 33],
        [9, 33],
        [10, 52],
        [11, 82],
        [12, 74],
        [13, 44],
        [14, 64],
        [15, 14],
        [16, 54],
        [17, 44],
        [18, 64],
        [19, 14],
        [20, 64],
        [21, 24],
        [22, 44],
        [23, 64],
        [24, 74],
        [25, 34],
        [26, 54],
        [27, 64],
        [28, 14],
        [29, 54],
        [30, 94],
      
      ],
    },
    westDelhi: {
      label: "West Delhi",
      data: [
        [0, 98],
        [1, 117],
        [2, 125],
        [3, 140],
        [4, 142],
        [5, 140],
        [6, 137],
        [7, 135],
        [8, 133],
        [9, 133],
        [10, 152],
        [11, 182],
        [12, 174],
        [13, 244],
        [14, 164],
        [15, 114],
        [16, 94],
        [17, 74],
        [18, 54],
        [19, 114],
        [20, 164],
        [21, 124],
        [22, 144],
        [23, 164],
        [24, 174],
        [25, 134],
        [26, 154],
        [27, 164],
        [28, 114],
        [29, 154],
        [30, 94],

      ],
    },
    northDelhi: {
      label: "North Delhi",
      data: [
        [0, 148],
        [1, 147],
        [2, 145],
        [3, 180],
        [4, 192],
        [5, 210],
        [6, 237],
        [7, 235],
        [8, 233],
        [9, 233],
        [10, 252],
        [11, 282],
        [12, 274],
        [13, 244],
        [14, 264],
        [15, 214],
        [16, 254],
        [17, 244],
        [18, 264],
        [19, 214],
        [20, 194],
        [21, 164],
        [22, 144],
        [23, 164],
        [24, 174],
        [25, 154],
        [26, 154],
        [27, 164],
        [28, 204],
        [29, 154],
        [30, 194],

      ],
    },
    southDelhi: {
      label: "South Delhi",
      data: [
        [0, 248],
        [1, 247],
        [2, 245],
        [3, 240],
        [4, 242],
        [5, 240],
        [6, 237],
        [7, 235],
        [8, 233],
        [9, 233],
        [10, 262],
        [11, 282],
        [12, 294],
        [13, 314],
        [14, 320],
        [15, 314],
        [16, 354],
        [17, 344],
        [18, 364],
        [19, 314],
        [20, 324],
        [21, 354],
        [22, 344],
        [23, 364],
        [24, 374],
        [25, 334],
        [26, 354],
        [27, 364],
        [28, 314],
        [29, 354],
        [30, 394],

      ],
    },
   
  };
  /* var dataSet = [
    {label: "USA", color: "#005CDE" },
    {label: "Russia", color: "#005CDE" },
    { label: "UK", color: "#00A36A" },
    { label: "Germany", color: "#7D0096" },
    { label: "Denmark", color: "#992B00" },
    { label: "Sweden", color: "#DE000F" },
    { label: "Norway", color: "#ED7B00" }    
];*/
  // hard-code color indices to prevent them from shifting as
  // countries are turned on/off
  var i = 0;
  $.each(datasets, function (key, val) {
    val.color = i;
    ++i;
  });

  // insert checkboxes
  var choiceContainer = $("#choices");
  $.each(datasets, function (key, val) {
    choiceContainer.append(
      '<input type="checkbox" name="' +
        key +
        '" checked="checked" id="id' +
        key +
        '">' +
        '<label for="id' +
        key +
        '">' +
        val.label +
        "</label>"
    );
  });
  choiceContainer.find("input").click(plotAccordingToChoices);

  function plotAccordingToChoices() {
    var data = [];

    choiceContainer.find("input:checked").each(function () {
      var key = $(this).attr("name");
      if (key && datasets[key]) data.push(datasets[key]);
    });

    if (data.length > 0)
      $.plot($("#placeholder"), data, {
        yaxis: { min: 0 },
        xaxis: { tickDecimals: 0 },
      });
  }

  plotAccordingToChoices();
});
