<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"/Users/modou/Works/web/newlc/public/../application/backend/view/admin_users/adminlist.html";i:1534736720;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/footer.html";i:1533524129;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $config['1']; ?>-<?php echo lang('name'); ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="__STATICBACKEND__/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="__STATICBACKEND__/layuiadmin/style/admin.css" media="all">
  <link rel="stylesheet" type="text/css" href="__STATICBACKEND__/other/pagelist.css" />
  <script type="text/javascript" src="__STATICBACKEND__/other/jquery.min.js"></script>
  <script src="__STATICBACKEND__/layuiadmin/layui/layui.js"></script> 
  <script src="__STATICBACKEND__/other/main.js"></script> 
  <link rel="Shortcut Icon" href="/uploads/logo/<?php echo $config['21']; ?>" />
  <style type="text/css">
    .reqcolor{
      color:red;
    }
  </style>
</head>
<body>


  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-body">
          	<form action="<?php echo url('AdminUsers/adminList'); ?>" method="get" class="layui-form">
          	<div class="layui-form-item">
          		<?php if($data['gp_role']==1): ?>
			    <div class="layui-input-inline" style="">
			        <select name="group_id" lay-verify="required" lay-search="" >
			          <option value="">所属部门</option>
			          <?php foreach($data['groupList'] as $v): if($v['id'] == $data['param']['group_id']): ?>
			          		<option value="<?php echo $v['id']; ?>" selected><?php echo $v['group_name']; ?></option>
						<?php else: ?>
						<option value="<?php echo $v['id']; ?>"><?php echo $v['group_name']; ?></option>
						<?php endif; endforeach; ?>
			        </select>
			    </div>
			    <?php endif; ?>
	            <div class="layui-input-inline">
	                <input type="text" name="real_name"  autocomplete="off" class="layui-input" placeholder="姓名" value="<?php echo !empty($data['param']['real_name'])?$data['param']['real_name']:''; ?>">
	            </div>
	            <div class="layui-input-inline" style="width:150px;">
	            	<input type="text" class="layui-input"  placeholder="电话" id="" name="mobile" value="<?php echo !empty($data['param']['mobile'])?$data['param']['mobile']:''; ?>">
	            </div>
	           	<div class="layui-input-inline" style="width:120px;" >
	           		<input type="text" class="layui-input" placeholder="登陆账号" id="" name="admin_name" value="<?php echo !empty($data['param']['admin_name'])?$data['param']['admin_name']:''; ?>">
	           	</div>
	            <button class="layui-btn" >搜索</button>
	            </form>
	            <?php if($data['gp_role']!=3): ?>
	            <a href="javascript:;"  class="layui-btn" onclick="add_data('添加员工',0)"><i class="layui-icon">&#xe654;</i>添加</a>
	            <?php endif; ?>

	        </div>
          	
            <table class="layui-table">
              <thead>
                <tr>
                  	<th width="">ID</th>
                  	<th width="">登录账号</th>
					<th width="">姓名</th>
					<th width="">所属部门</th>
					<th width="">职位</th>
					<th width="">邮箱</th>
					<th width="">电话</th>
					<th width="">注册时间</th>
					<th width="">上次登录</th>
					<th width="">是否锁定</th>
					<th width="">操作</th>
                </tr> 
              </thead>
              <tbody>
              	<?php foreach($data['data'] as $k=>$vo): ?>
				<tr class="text-hidden-<?php echo $vo->id; ?>">
					<td><?php echo $vo->id; ?></td>
					<td><?php echo $vo->admin_name; ?></td>
					<td><?php echo $vo->real_name; ?></td>
					<td>
					<?php  if(isset($vo->hasGroupone->group_name)){ ?>
						<?php echo $vo->hasGroupone->group_name;  } ?>
					</td>
					<td><?php echo !empty($vo->group_role)?$data['group_role_name'][$vo->group_role]:''; ?></td>
					<td><?php echo $vo->email; ?></td>
					<td><?php echo $vo->mobile; ?></td>
					<td><?php echo $vo['created_time']; ?></td>
					<td>
						<?php echo $vo['login_time']; ?>
					</td>
					<td class="td-status-<?php echo $vo['id']; ?>">
						<span class="label <?php echo !empty($vo['status'])?'label-success':'label-default'; ?>  radius"><?php echo !empty($vo['status'])?'已启用' : '已锁定'; ?></span>
					</td>
					<td>
						
						<?php if($data['gp_role']==2): if($vo->group_role!=2): ?>
							<a title="编辑" href="javascript:;" onclick="add_data('编辑管理员',<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"><i class="layui-icon">&#xe642;</i></a> 
							<a title="重置密码" href="javascript:;" onclick="edit_pwd('重置密码',<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"><i class="layui-icon">&#xe673;</i></a> 
							<a title="删除" href="javascript:;" onclick="del(<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"  ><i class="layui-icon">&#xe640;</i></a>
							
							<?php endif; elseif($data['gp_role']==3): else: ?>
						<a title="编辑" href="javascript:;" onclick="add_data('编辑管理员',<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"><i class="layui-icon">&#xe642;</i></a> 
						<a title="重置密码" href="javascript:;" onclick="edit_pwd('重置密码',<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"><i class="layui-icon">&#xe673;</i></a> 
						<a title="删除" href="javascript:;" onclick="del(<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"  ><i class="layui-icon">&#xe640;</i></a>
						
						<?php endif; ?>
						</div>
						</td>
					</tr>
				</tr>
				<?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="pagelist">
			<?php echo $data['data']->render(); ?>
		  </div>
        </div>
      </div>
    </div>
  </div>
	<script type="text/javascript">
	    function add_data(title,id){
	        var url = "<?php echo url('AdminUsers/adminAdd'); ?>"+ '?id=' + id;
	        x_admin_show(title,url);
	    }
	    function edit_pwd(title,id){
	        var url = "<?php echo url('AdminUsers/editPwd'); ?>"+ '?id=' + id;
	        x_admin_show(title,url,400,300);
	    }

	    function del(id){
	    	layer.confirm('确认要删除吗？',function(index){
		      	var url = "<?php echo url('adminUsers/adminDelete'); ?>";
		      	jqueryAjax('POST',url,{id:id},successReload);
	      	});
	    }
	</script>

<script>
  layui.config({
    base: '__STATICBACKEND__/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'form', 'laydate'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,element = layui.element
    ,layer = layui.layer
    ,laydate = layui.laydate
    ,form = layui.form;
  });
</script>
</body>
</html>

