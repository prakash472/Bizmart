<section>
<table>
<tr>
<th>Order</th> 
<th>Retailer Name</th>
<th>Due amount</th>
<th>Invoice No</th>
<th>Total Product</th>
<th>Order Date</th>
<th>Paid/Unpaid</th>
<th>Status</th>
<th>Verified/Unverified</th>
</tr>
</section>
<style>
@import "compass/css3";

section {
  width: 80%;
  margin: 0 auto;
  position: relative;
  border-right: 2px dashed #ddd;
  border-left: 2px dashed #ddd;
}
table {
   width: 100%; 
  text-align: center;
  min-width: 700px;
}
th, td {
  width: 10%; 
  padding: 10px 0;
}
th {
  color: #002E4D;  
}
tr {
  border-top: 4px solid #fff;
  background: #F1F1F0;
  &:nth-child(even) {
     background: #f9f9f9; 
  }
  thead &{
    background: #aaa;
  }
}
div {
  
  overflow-x:scroll;
}
@media only screen 
and (max-width : 700px) {
section:after {
    content:'';
  	position: absolute;
		z-index: 10;
		top: 0;
		bottom: 0;
		right: 0;
		width: 10%;
		background: -webkit-linear-gradient(left, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
		background:    -moz-linear-gradient(left, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
		background:     -ms-linear-gradient(left, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
		background:      -o-linear-gradient(left, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
		background:     linear-gradient(to right, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
	}
section:before {
		content:'';
		position: absolute;
		z-index: 10;
		top: 0;
		bottom: 0;
		left: 0;
		width: 10%;
		background: -webkit-linear-gradient(right, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
		background:    -moz-linear-gradient(right, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
		background:     -ms-linear-gradient(right, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
		background:      -o-linear-gradient(right, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
		background:       linear-gradient(to left, rgba(0,0,0,0) 10%, rgba(0,0,0,0.2));
	}
}</style>