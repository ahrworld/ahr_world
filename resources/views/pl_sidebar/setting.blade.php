@extends('pl_sidebar/sidebar')
@section('line_menu')
@include('pl_sidebar/line_menu')
@endsection
@section('content')
<style>
	main{
		margin-top:50px;
	}
	main .scol{
		background: #FFF;
	}
	main .scol .setting thead th{
		 border-bottom: 2px solid #484848 !important;
		 font-size: 20px !important;
	}
	main .scol .setting tbody th{
		 vertical-align: baseline !important;
		 color:#000;
		 font-weight: 200;
	}
	main .scol hr{
		 border:2;
	}
	main .scol tbody tr:hover{
		 background:#F1F1F1;
	}
	main .scol tbody tr.FFF{
		 background:#FFF;
	}
	main .scol tbody tr td{
		 padding:10px 2px;
	}
	main .scol tbody tr td:first-child{
		 color:#000;
	}
	main .scol tbody tr .edit{
		 color:#3B598D;
		 cursor: pointer;
	}
</style>
<script>
	$(document).ready(function() {
		$('.edit_ct').hide();
		// if ($('edit_ct').css('display') == 'table-cell') {

		// };
		$('.edit').click(function(){
			$(this).hide().siblings('td').hide().siblings('.edit_ct').show();
			$('main .container tbody tr').addClass('FFF');
		});
		$('.ahr-button-cancel').click(function(){
			$(this).parents('td').hide().siblings('td').show();
			$('main .container tbody tr').removeClass('FFF');
		});
	});
</script>

	<div class="scol"  style="width:60%; float:left; margin-left:15px;">
		<div class="setting" style="padding:20px 30px;">

			<table class="table table-condensed" >
			    <thead>
			        <tr>
			            <th colspan="3">設定</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <th scope="row" width="150">ユーザーネーム</th>
			            <td class="name" width="500"></td>
			            <td class="edit" width="100" align="right">編集</td>
			            <td class="edit_ct" width="600" colspan="2">
			            	<p>※ユーザーネームの変更は一度しかできません。</p>
			            	<input type="text">
			            	<hr>
			                <button type="button" class="btn ahr-button-default">変更</button>
			                <button type="button" class="btn ahr-button-cancel">キャンセル</button>
			            </td>
			        </tr>
			        <tr>
			            <th scope="row" width="150">メールアカウント追加</th>
			            <td width="500">ahr@gmail.com</td>
			            <td class="edit" width="100" align="right">編集</td>
			            <td class="edit_ct" width="600" colspan="2">
			            	<p>メインの連絡先&nbsp;&nbsp;&nbsp;<span><input type="radio" checked>&nbsp;ahr@gmail.com</span></p>
			            	<hr>
			            	<p>新規メールアドレスを追加する<label class="add"></label></p>
			            	<input type="text"><span>&nbsp;@&nbsp;</span><input type="text">
			            	<!-- jquery add -->
			            	<hr>
			                <button type="button" class="btn ahr-button-default">変更</button>
			                <button type="button" class="btn ahr-button-cancel">キャンセル</button>
			            </td>
			        </tr>
			        <tr>
			            <th scope="row" width="150">オリジナルURL</th>
			            <td width="500">https://www.○○○○○○○○○○○○○○○</td>
			            <td class="edit" width="100" align="right">編集</td>
			            <td class="edit_ct" width="600" colspan="2">
			            	<p>現在のURL&nbsp;&nbsp;&nbsp;<span>https://www.○○○○○○○○○○○○○○○</span></p>
			            	<hr>
			            	<p>新規URLに変更する</p>
			            	<input type="text" size="50">
			            	<hr>
			                <button type="button" class="btn ahr-button-default">変更</button>
			                <button type="button" class="btn ahr-button-cancel">キャンセル</button>
			            </td>
			        </tr>
			        <tr>
			            <th scope="row" width="150">言語選択（日・中・英・越)</th>
			            <td width="500">OOOOOOOOOOO</td>
			            <td class="edit" width="100" align="right">編集</td>
			            <td class="edit_ct" width="600" colspan="2">
			            	<p>現在メインの言語&nbsp;&nbsp;&nbsp;<span>日本語</span></p>
			            	<hr>
			            	<p>言語を選択</p>
			            	<select>
			            		<option value="1">日本語</option>
			            		<option value="2">英語</option>
			            		<option value="3">中囯語</option>
			            		<option value="4">ベトナム語</option>
			            	</select>
			            	<hr>
			                <button type="button" class="btn ahr-button-default">変更</button>
			                <button type="button" class="btn ahr-button-cancel">キャンセル</button>
			            </td>
			        </tr>
			        <tr>
			            <th scope="row" width="150">ブロック新規追加</th>
			            <td width="500">OOOOOOOOOOO</td>
			            <td class="edit" width="100" align="right">編集</td>
			            <td class="edit_ct" width="600" colspan="2">
			            	<p>企業名入力&nbsp;&nbsp;&nbsp;</p>
			            	<div><input type="text">&nbsp;<button class="btn" style="padding:1px 5px; color:#FFF;">ブロックする</button>&nbsp;<label class="add"></label></div>
			            	<!-- jquery add -->
			            	<hr>
			                <button type="button" class="btn ahr-button-default">変更</button>
			                <button type="button" class="btn ahr-button-cancel">キャンセル</button>
			            </td>
			        </tr>
			        <tr>
			            <th scope="row" width="150">ブロック削除</th>
			            <td width="500">OOOOOOOOOOO</td>
			            <td class="edit" width="100" align="right">編集</td>
			            <td class="edit_ct" width="600" colspan="2">
			            	<p>現在ブロック中の企業&nbsp;&nbsp;&nbsp;</p>
			            	<div>OOOOOO&nbsp;&nbsp;<button class="btn btn-danger" style="padding:1px 5px; color:#FFF;">ブロックする</button></div>
			            	<!-- jquery add -->
			            	<hr>
			                <button type="button" class="btn ahr-button-default">変更</button>
			                <button type="button" class="btn ahr-button-cancel">キャンセル</button>
			            </td>
			        </tr>
			        <tr>
			            <th scope="row" width="150">内定報告（お祝い金)</th>
			            <td width="500">OOOOOOOOOOO</td>
			            <td class="edit" width="100" align="right">編集</td>
			            <td class="edit_ct" width="600" colspan="2">
			            	<textarea class="form-control" rows="3"></textarea>
			            	<hr>
			                <button type="button" class="btn ahr-button-default">変更</button>
			                <button type="button" class="btn ahr-button-cancel">キャンセル</button>
			            </td>
			        </tr>
			    </tbody>
			</table>

		</div>
	</div>


@endsection
