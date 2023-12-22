<!-- Dashboard Script -->
<script  defer>
document.addEventListener("DOMContentLoaded", function() {
(function (jQuery) {
  "use strict";

  const secondaryColor = "#e05e07";
  const yellowColor = "#084ad8";
  const tertiaryColor = "#063d9a";

  /*---------------------------analytics chart-----*/
  if (document.querySelectorAll("#analytics-chart-03").length) {
    /*GRAFICOS PRESTADORES*/ 
    const colors = [secondaryColor, tertiaryColor];
    const options = {
        series: [{
            name:'Prestadores',
        data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
      }],
        chart: {
        type: 'bar',
        height: 250,

        toolbar: {
          show: false,
        },
        },
        yaxis:{
            min:0,
            max:100
        },
        plotOptions: {
          bar: {
            barHeight: '100%',
            distributed: true,
            borderRadius: 2,
            dataLabels: {
              position: 'top',
            enabled:true
            },
          }
        },
        colors:colors,
        legend: {
          show: false,
        },
        stroke: {
          show: true,
      },
        grid: {
          show: true,
          strokeDashArray: 2,
        },
        dataLabels: {
          enabled: true,
          textAnchor: 'middle',
          style: {
            colors: ['#fff']
          },
        },
        xaxis: {
            categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
        },

        yaxis: {
          labels: {
            show: true,
            minWidth: 20,
            maxWidth: 20,
          },
          min:0,
          max:100
        },
        tooltip: {
          theme: 'dark',
          x: {
            show: true
          },

        }
        };

   const chart = new ApexCharts(
      document.querySelector("#analytics-chart-03"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [secondaryColor, tertiaryColor, yellowColor];
      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#analytics-chart-02").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };
   const chart = new ApexCharts(
      document.querySelector("#analytics-chart-02"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#analytics-chart-04").length) {
    const colors = [secondaryColor, tertiaryColor, yellowColor];
    const options = {
      series: [44, 55, 41],
      chart: {
      type: 'donut',
      width: '100%',
      height: 340,
    },
    plotOptions: {
      pie: {
        startAngle: -120,
        endAngle: 120,
      }
    },
    colors:colors,
    dataLabels: {
      enabled: false,
    },
    legend: {
      show:false
    },
    grid: {
      padding: {
        bottom: -80
      }
    },
    responsive: [{
      breakpoint: 1400,
      options: {
        chart: {
          width: 270,
          height: 300
        },

      },
    },
    {
      breakpoint: 480,
      options: {
        chart: {
          width: 300
        },

      }
    },
    {
      breakpoint: 380,
      options: {
        chart: {
          width: 100,
        }

      }
    }
  ]
    };
   const chart = new ApexCharts(
      document.querySelector("#analytics-chart-04"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [ tertiaryColor,secondaryColor, yellowColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#analytics-chart-01").length) {
    let options = {
        series: [{
        name: 'Downloads',
        data:[10,20,30,45,55,76,60,34,23,34,45,6]
      }, {
        name: 'Registros',
        data:[10,20,30,37,39,10,30,44,8,10,23,8]
      },],
        chart: {
        type: 'bar',
        height: 350,
        stacked: true
      },
      dataLabels: {
        formatter: (val) => {
          return val + '%'
        }
      },
      plotOptions: {
        bar: {
          horizontal: false
        }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom',
            offsetX: -10,
            offsetY: 0
          }
        }
      }],
      xaxis: {
        categories: ['Jan', 'Fev', 'Mar','Abr','Mai','Jun', 'Jul', 'Ago', 'Set', 'Out',
        'Nov','Dez'],
      },

      yaxis:{
        labels: {
            formatter: (val) => {
              return val  + '%'
            },
          },
        min:0,
        max:100
      },

      grid: {
        show: true,
        strokeDashArray: 7,
      },

      };


   const chart = new ApexCharts(
      document.querySelector("#analytics-chart-01"),
      options
    );
    chart.render();
    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [tertiaryColor,secondaryColor];
      const newOpt = {
        colors: colors,
        fill: {
          type: "solid",
          gradient: {
            type: "horizontal",
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }





/* charts */
if (document.querySelectorAll("#chart-01").length) {

    let options = {
        series: [{
            name:'Usuários',
            data: [44, 55, 41, 64, 22, 43, 21,23,44,56,56,7]
          },
          ],
            chart: {
            type: 'bar',
            height: 430
          },
          plotOptions: {
            bar: {
              horizontal: true,
              dataLabels: {
                position: 'top',
                maxItems: 100,
              },
            }
          },
          dataLabels: {
            enabled: true,
            offsetX: -6,
            style: {
              fontSize: '12px',
              colors: ['#fff']
            },
          },
          stroke: {
            show: true,
            width: 1,
            colors: ['#fff']
          },
          tooltip: {
            shared: true,
            intersect: false
          },
          xaxis: {
            categories: ['Jan', 'Fev', 'Mar','Abr','Mai','Jun', 'Jul', 'Ago', 'Set', 'Out',
            'Nov','Dez'],
          },

          yaxis:{
            max:100,
          },
          grid: {
            show: true,
            strokeDashArray: 7,
          },


    };

   const chart = new ApexCharts(
      document.querySelector("#chart-01 "),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [tertiaryColor];
      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  };

  if (document.querySelectorAll("#chart-02").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };
   const chart = new ApexCharts(
      document.querySelector("#chart-02"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#chart-03").length) {
    const colors = [ tertiaryColor];
    let options = {
        series: [{
        name: 'Solicitação',
        data: [44, 55, 41, 37, 22, 43, 21,23,32,19,11,12]
      }, 
    ],
        chart: {
        type: 'bar',
        height: 350,
        stacked: true,
      },
      plotOptions: {
        bar: {
          horizontal: true,
        },
      },
      stroke: {
        width: 1,
        colors: ['#fff']
      },

      xaxis: {
        categories: ['Jan', 'Fev', 'Mar','Abr','Mai','Jun', 'Jul', 'Ago', 'Set', 'Out',
            'Nov','Dez'],
      },

      yaxis:{
        min:0,
        max:100
      },

      legend: {
        position: 'top',
        horizontalAlign: 'left',
        offsetX: 40
      }
      };

   const chart = new ApexCharts(
      document.querySelector("#chart-03"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [tertiaryColor];
      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  
  if (document.querySelectorAll("#chart-04").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };
   const chart = new ApexCharts(
      document.querySelector("#chart-04"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#chart-05").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };
   const chart = new ApexCharts(
      document.querySelector("#chart-05"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#chart-06").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };
   const chart = new ApexCharts(
      document.querySelector("#chart-06"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#chart-07").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };
   const chart = new ApexCharts(
      document.querySelector("#chart-07"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }

  if (document.querySelectorAll("#chart-08").length) {
    const colors = [secondaryColor, tertiaryColor];
    let options = {
        series: [44, 55, 41, 17, 15,20,33,40,22,11,12,23],
          labels:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
        chart: {
        type: 'donut',
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 300,
            height:700
          },
          legend: {
            position: 'bottom'
          }
        }
      }],
      dataLabels: {
        enabled: false,

        },
        plotOptions: {
            pie: {
              donut: {
                labels: {
                  show: true,
                },
                size: '50%'
              }
            }
          }
      };

   const chart = new ApexCharts(
      document.querySelector("#chart-08 "),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [secondaryColor, tertiaryColor,];
      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }

  if (document.querySelectorAll("#chart-09").length) {
    let options = {
        series: [{
        name: 'Categoria de serviços',
        data:[10,20,30,45,55,76,60,34,23,34,45,6]
      }, {
        name: 'Subcategoria de serviços',
        data:[10,20,30,37,39,10,30,44,8,10,23,8]
      },],
        chart: {
        type: 'bar',
        height: 350,
        stacked: true
      },
      dataLabels: {
        formatter: (val) => {
          return val + '%'
        }
      },
      plotOptions: {
        bar: {
          horizontal: false
        }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom',
            offsetX: -10,
            offsetY: 0
          }
        }
      }],
      xaxis: {
        categories: ['Jan', 'Fev', 'Mar','Abr','Mai','Jun', 'Jul', 'Ago', 'Set', 'Out',
        'Nov','Dez'],
      },

      yaxis:{
        labels: {
            formatter: (val) => {
              return val  + '%'
            },
          },
        min:0,
        max:100
      },

      grid: {
        show: true,
        strokeDashArray: 7,
      },

      };


   const chart = new ApexCharts(
      document.querySelector("#chart-09"),
      options
    );
    chart.render();
    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [tertiaryColor,secondaryColor];
      const newOpt = {
        colors: colors,
        fill: {
          type: "solid",
          gradient: {
            type: "horizontal",
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }

  if (document.querySelectorAll("#chart-10").length) {
    const colors = [secondaryColor, tertiaryColor, '#f2c713'];
    let options = {
        series: [{
        name: 'Categoria Registada',
        data: [44, 55, 41, 37, 22, 43, 21,23,32,19,11,12]
      }, {
        name: 'subcategoria Registada',
        data: [53, 32, 33, 52, 13, 43, 32,10,11,20,11,12]
      },
    ],
        chart: {
        type: 'bar',
        height: 350,
        stacked: true,
      },
      plotOptions: {
        bar: {
          horizontal: true,
        },
      },
      stroke: {
        width: 1,
        colors: ['#fff']
      },

      xaxis: {
        categories: ['Jan', 'Fev', 'Mar','Abr','Mai','Jun', 'Jul', 'Ago', 'Set', 'Out',
            'Nov','Dez'],
      },

      yaxis:{
        min:0,
        max:100
      },

      legend: {
        position: 'top',
        horizontalAlign: 'left',
        offsetX: 40
      }
      };

   const chart = new ApexCharts(
      document.querySelector("#chart-10"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [secondaryColor, tertiaryColor, '#f2c713'];
      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }

  if (document.querySelectorAll("#chart-11").length) {
    const colors = [secondaryColor, tertiaryColor, '#f2c713'];
    let options = {
        series: [{
        name: 'Receita por Categoria',
        data: [44, 55, 41, 37, 22, 43, 21,23,32,19,11,12]
      }, {
        name: 'Receita por subcategoria',
        data: [53, 32, 33, 52, 13, 43, 32,10,11,20,11,12]
      },
    ],
        chart: {
        type: 'bar',
        height: 350,
        stacked: true,
      },
      plotOptions: {
        bar: {
          horizontal: true,
        },
      },
      stroke: {
        width: 1,
        colors: ['#fff']
      },

      xaxis: {
        categories: ['Jan', 'Fev', 'Mar','Abr','Mai','Jun', 'Jul', 'Ago', 'Set', 'Out',
            'Nov','Dez'],
      },

      yaxis:{
        min:0,
        max:100
      },

      legend: {
        position: 'top',
        horizontalAlign: 'left',
        offsetX: 40
      }
      };

   const chart = new ApexCharts(
      document.querySelector("#chart-11"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const colors = [secondaryColor, tertiaryColor, '#f2c713'];
      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }

  if (document.querySelectorAll("#chart-12").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };
   const chart = new ApexCharts(
      document.querySelector("#chart-12"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#chart-13").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };
   const chart = new ApexCharts(
      document.querySelector("#chart-13"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
  if (document.querySelectorAll("#chart-14").length) {
    const colors = [yellowColor, secondaryColor];
    const options = {
    series: [{
        name:'Prestadores',
    data: [40, 80, 10, 40, 50, 60,10,30,8,10,20,12]
  }],
    chart: {
    type: 'bar',
    height: 250,

    toolbar: {
      show: false,
    },
    },
    yaxis:{
        min:0,
        max:100
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        borderRadius: 2,
        dataLabels: {
          position: 'top',
        enabled:true
        },
      }
    },
    colors:colors,
    legend: {
      show: false,
    },
    stroke: {
      show: true,
  },
    grid: {
      show: true,
      strokeDashArray: 2,
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
      style: {
        colors: ['#fff']
      },

      dropShadow: {
        enabled: false,
      }
    },
    xaxis: {
        categories:['Jan', 'Fev','Mar','Abr','Mai', 'Jun', 'Jul','Ago','Set','Out','Nov','Dez'],
    },

    yaxis: {
      labels: {
        show: true,
        minWidth: 20,
        maxWidth: 20,
      },
      min:0,
      max:100
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: true
      },

    }
    };

   const chart = new ApexCharts(
      document.querySelector("#chart-14"),
      options
    );
    chart.render();

    //color customizer
    document.addEventListener("theme_color", (e) => {
      const variableColors = IQUtils.getVariableColor();
      const colors = [tertiaryColor, secondaryColor];

      const newOpt = {
        colors: colors,
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            type: "vertical",
            gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
            opacityFrom: 1,
            opacityTo: 1,
            colors: colors,
          },
        },
      };
      chart.updateOptions(newOpt);
    });

    //Font customizer
    document.addEventListener("body_font_family", (e) => {
      let prefix =
        getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
      if (prefix) {
        prefix = prefix.trim();
      }
      const font_1 = getComputedStyle(document.body).getPropertyValue(
        `--${prefix}body-font-family`
      );
      const fonts = [font_1.trim()];
      const newOpt = {
        chart: {
          fontFamily: fonts,
        },
      };
      chart.updateOptions(newOpt);
    });
  }
})(jQuery);
});
</script>
  