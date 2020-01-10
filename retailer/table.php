<div class="container">
<h1>Responsive Table</h1>
  <table class="rwd-table">
    <tbody>
      <tr>
        <th>Supplier Code</th>
        <th>Supplier Name</th>
        <th>Invoice Number</th>
        <th>Invoice Date</th>
        <th>Due Date</th>
        <th>Net Amount</th>
      </tr>
      <tr>
        <td data-th="Supplier Code">
          UPS5005
        </td>
        <td data-th="Supplier Name">
          UPS
        </td>
        <td data-th="Invoice Number">
          ASDF19218
        </td>
        <td data-th="Invoice Date">
          06/25/2016
        </td>
        <td data-th="Due Date">
          12/25/2016
        </td>
        <td data-th="Net Amount">
          $8,322.12
        </td>
      </tr>
      <tr>
        <td data-th="Supplier Code">
          UPS3449
        </td>
        <td data-th="Supplier Name">
          UPS South Inc.
        </td>
        <td data-th="Invoice Number">
          ASDF29301
        </td>
        <td data-th="Invoice Date">
          6/24/2016
        </td>
        <td data-th="Due Date">
          12/25/2016
        </td>
        <td data-th="Net Amount">
          $3,255.49
        </td>
      </tr>
      <tr>
        <td data-th="Supplier Code">
          BOX5599
        </td>
        <td data-th="Supplier Name">
          BOX Pro West
        </td>
        <td data-th="Invoice Number">
          ASDF43000
        </td>
        <td data-th="Invoice Date">
          6/27/2016
        </td>
        <td data-th="Due Date">
          12/25/2016
        </td>
        <td data-th="Net Amount">
          $45,255.49
        </td>
      </tr>
      <tr>
        <td data-th="Supplier Code">
          PAN9999
        </td>
        <td data-th="Supplier Name">
          Pan Providers and Co.
        </td>
        <td data-th="Invoice Number">
          ASDF33433
        </td>
        <td data-th="Invoice Date">
          6/29/2016
        </td>
        <td data-th="Due Date">
          12/25/2016
        </td>
        <td data-th="Net Amount">
          $12,335.69
        </td>
      </tr>
    </tbody>
  </table>
  <h3>Resize Me</h3>
</div>
<style>
@import 'https://fonts.googleapis.com/css?family=Open+Sans:600,700';

* {font-family: 'Open Sans', sans-serif;}

.rwd-table {
  margin: auto;
  min-width: 300px;
  max-width: 100%;
  border-collapse: collapse;
}

.rwd-table tr:first-child {
  border-top: none;
  background: #428bca;
  color: #fff;
}

.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  background-color: #f5f9fc;
}

.rwd-table tr:nth-child(odd):not(:first-child) {
  background-color: #ebf3f9;
}

.rwd-table th {
  display: none;
}

.rwd-table td {
  display: block;
}

.rwd-table td:first-child {
  margin-top: .5em;
}

.rwd-table td:last-child {
  margin-bottom: .5em;
}

.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 120px;
  display: inline-block;
  color: #000;
}

.rwd-table th,
.rwd-table td {
  text-align: left;
}

.rwd-table {
  color: #333;
  border-radius: .4em;
  overflow: hidden;
}

.rwd-table tr {
  border-color: #bfbfbf;
}

.rwd-table th,
.rwd-table td {
  padding: .5em 1em;
}
@media screen and (max-width: 601px) {
  .rwd-table tr:nth-child(2) {
    border-top: none;
  }
}
@media screen and (min-width: 600px) {
  .rwd-table tr:hover:not(:first-child) {
    background-color: #d8e7f3;
  }
  .rwd-table td:before {
    display: none;
  }
  .rwd-table th,
  .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child,
  .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child,
  .rwd-table td:last-child {
    padding-right: 0;
  }
  .rwd-table th,
  .rwd-table td {
    padding: 1em !important;
  }
}


/* THE END OF THE IMPORTANT STUFF */

/* Basic Styling */
body {
background: #4B79A1;
background: -webkit-linear-gradient(to left, #4B79A1 , #283E51);
background: linear-gradient(to left, #4B79A1 , #283E51);        
}
h1 {
  text-align: center;
  font-size: 2.4em;
  color: #f2f2f2;
}
.container {
  display: block;
  text-align: center;
}
h3 {
  display: inline-block;
  position: relative;
  text-align: center;
  font-size: 1.5em;
  color: #cecece;
}
h3:before {
  content: "\25C0";
  position: absolute;
  left: -50px;
  -webkit-animation: leftRight 2s linear infinite;
  animation: leftRight 2s linear infinite;
}
h3:after {
  content: "\25b6";
  position: absolute;
  right: -50px;
  -webkit-animation: leftRight 2s linear infinite reverse;
  animation: leftRight 2s linear infinite reverse;
}
@-webkit-keyframes leftRight {
  0%    { -webkit-transform: translateX(0)}
  25%   { -webkit-transform: translateX(-10px)}
  75%   { -webkit-transform: translateX(10px)}
  100%  { -webkit-transform: translateX(0)}
}
@keyframes leftRight {
  0%    { transform: translateX(0)}
  25%   { transform: translateX(-10px)}
  75%   { transform: translateX(10px)}
  100%  { transform: translateX(0)}
}

/*
    Don't look at this last part. It's unnecessary. I was just playing with pixel gradients... Don't judge.
*/
/*
@media screen and (max-width: 601px) {
  .rwd-table tr {
    background-image: -webkit-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -moz-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -o-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -ms-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
  }
  .rwd-table tr:nth-child(odd) {
    background-image: -webkit-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -moz-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -o-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -ms-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
  }
}*/
</style>