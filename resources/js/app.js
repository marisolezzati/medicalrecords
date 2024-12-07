import { isEmptyObject } from 'jquery';
import './bootstrap';
import Chart from 'chart.js/auto';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(function () {
    if(!isEmptyObject(measureName)){
        creteLineGraph();
    }
});

function creteLineGraph(){

    let ctx = document.getElementById('myChart1').getContext('2d');
    const dataLength = grData.length;
    let labels = [];
    let data = [];
    let maxValues = new Array(dataLength);
    maxValues.fill(maxValue);
    let minValues = new Array(dataLength);
    minValues.fill(minValue);
    grData.forEach(function(result){
        labels.push(result.date);
        data.push(result.value);
    })
    new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: "Min value",
            data: minValues,
            //borderColor: ["blue", "blue","blue"]
          },
          {
            label: "Max value",
            data: maxValues,
          },
          {
            label: measureName,
            data: data,
          },]

        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
}


