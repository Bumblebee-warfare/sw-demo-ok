@extends('layouts.master')
@section('content')

<!--link href="{{ url('vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"-->
<link href="{{ url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ url('vendor/tableexport/dist/css/tableexport.min.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/examples.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/jquerysctipttop.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/paging.css')}}" rel="stylesheet"/>
<script src="{{ url('vendor/tableexport/dist/js/jquery-ui.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/jquery.table.hpaging.min.js')}}"></script>

<h1>Defaults</h1>

<table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
  <thead style="padding:3px;cursor:pointer;">
    <tr>
      <th class="sorting" align="center">##</th>
      <th class="sorting">product_name</th>
      <th class="sorting">product_family</th>
      <th class="sorting">product_owner</th>
      <th class="sorting">emp_id</th>
      <th class="sorting">timestamp</th>
    </tr>
  </thead>
  <tbody id="tbody">
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('26');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/26/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">AXC</td>
      <td class="sorting">ACV</td>
      <td class="sorting">AAAAAAAAAAAAAA</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-09-30 00:14:10</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('23');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/23/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">A</td>
      <td class="sorting">A</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-09-29 23:49:28</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('1');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/1/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">BBBBBBBBBBBBBBBBBB</td>
      <td class="sorting">AAAAAAAAAAAAAAAAAXXXX</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-09-29 23:23:07</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('8');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/8/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">GGGGGGGG</td>
      <td class="sorting">GGGGGGGGG</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-09-23 12:38:23</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('11');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/11/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">NIMIT_S</td>
      <td class="sorting">SRISONGKRAM</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-09-12 15:43:30</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('6');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/6/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">GGGGGG</td>
      <td class="sorting">GGGG1</td>
      <td class="sorting">SITTHIPONG PUTTHANU</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-09-05 23:03:29</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('3');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/3/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">ABC</td>
      <td class="sorting">ABC2</td>
      <td class="sorting">SITTHIPONG PUTTHANU</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-09-03 20:57:11</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('2');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/2/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">ABC</td>
      <td class="sorting">ABC1</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-09-03 20:56:40</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('19');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/19/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">TRESSELB</td>
      <td class="sorting">TRESSELB_2</td>
      <td class="sorting">SITTHIPHONG PUTTHANU</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-06-28 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('12');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/12/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">TAHOE_XL</td>
      <td class="sorting">TAHOE_XL_1</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-28 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('13');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/13/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">TAHOE_XL</td>
      <td class="sorting">TAHOE_XL_2</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-28 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('10');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/10/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">MANTIS_PL</td>
      <td class="sorting">MANTIS_PL_2</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-28 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('9');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/9/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">MANTIS_PL</td>
      <td class="sorting">MANTIS_PL_1</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-28 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('18');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/18/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">TRESSELB</td>
      <td class="sorting">TRESSELB_1</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-28 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('21');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/21/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">VULCAN</td>
      <td class="sorting">VULCAN_2</td>
      <td class="sorting">SITTHIPHONG PUTTHANU</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-06-27 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('20');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/20/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">VULCAN</td>
      <td class="sorting">VULCAN_1</td>
      <td class="sorting">SITTHIPHONG PUTTHANU</td>
      <td class="sorting">1000222222</td>
      <td class="sorting">2017-06-27 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('17');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/17/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">TRAILXLS</td>
      <td class="sorting">TRAILXLS1</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-27 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('16');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/16/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">TRAILXLS</td>
      <td class="sorting">TRAILXLS_2</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-27 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('15');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/15/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">TAHOE2D</td>
      <td class="sorting">TAHOE2D_2</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-27 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('14');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/14/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">TAHOE2D</td>
      <td class="sorting">TAHOE2D_1</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-27 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('5');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/5/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">DRAGFLY1D</td>
      <td class="sorting">DRAGFLY1D_2</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-27 00:00:00</td>
    </tr>
    <tr>
      <td class="sorting" align="center">
        <a href="" onclick="deletex('4');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
        <a href="http://localhost:8000/sw-demo/product_detail/4/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
      </td>
      <td class="sorting">DRAGFLY1D</td>
      <td class="sorting">DRAGFLY1D_1</td>
      <td class="sorting">NIMIT SRISONGKRAM</td>
      <td class="sorting">1000222972</td>
      <td class="sorting">2017-06-27 00:00:00</td>
    </tr>
  </tbody>
</table>

<hr>

<script src="{{ url('vendor/tableexport/dist/js/xlsx.core.min.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/Blob.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/FileSaver.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/tableexport.min.js')}}"></script>
<script>

  var DefaultTable = document.getElementById('default-table');
  new TableExport(DefaultTable, 
  {
    headers: true,
    footers: true,
    formats: ['xlsx', 'csv', 'txt'],
    filename: 'id',
    bootstrap: true,
    position: 'bottom',
    ignoreRows: null,
    ignoreCols: 0,
    ignoreCSS: '.tableexport-ignore',
    emptyCSS: '.tableexport-empty',
    trimWhitespace: true
  });
</script>
<script type="text/javascript">
  $(function () {
    $("#default-table").hpaging({ "limit": 8 });
  });

  $("#btnApply").click(function () {
    var lmt = $("#pglmt").val();
    $("#default-table").hpaging("newLimit", lmt);
  });
</script>

@stop