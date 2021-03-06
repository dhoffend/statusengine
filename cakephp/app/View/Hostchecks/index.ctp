<?php
/**
* Copyright (C) 2015 Daniel Ziegler <daniel@statusengine.org>
*
* This file is part of Statusengine.
*
* Statusengine is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* (at your option) any later version.
*
* Statusengine is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Statusengine.  If not, see <http://www.gnu.org/licenses/>.
*/
$this->Paginator->options(['url' => Hash::merge($this->params['named'], $this->params['pass'])]);
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10">
			<h3>
			<i class="fa fa-ellipsis-h fa-lg"></i>&nbsp;
			<a href="<?php echo Router::url([
					'controller' => 'Hosts',
					'action' => 'details',
					$object['Objects']['object_id']
				]); ?>">
				<?php echo h($object['Objects']['name1']); ?>
			</a>
		</h3>

		</div>
		<div class="col-xs-12 col-sm-2">
			<?php echo $this->element('host_history'); ?>
		</div>
		<div class="col-xs-12">
			<h5><?php echo __('Hostcheck'); ?></h5>
		</div>
	</div>
	<hr />
	<div class="row">
		<?php echo $this->Filter->render();?>
		<div class="col-md-2 hidden-xs"><?php echo $this->Paginator->sort('Hostcheck.start_time', __('Date')); ?></div>
		<div class="col-md-2 hidden-xs"><?php echo __('Check attempt'); ?></div>
		<div class="col-md-1 hidden-xs"><?php echo $this->Paginator->sort('Hostcheck.state_type', __('State type')); ?></div>
		<div class="col-md-3 hidden-xs"><?php echo $this->Paginator->sort('Hostcheck.output', __('Output')); ?></div>
		<div class="col-md-4 hidden-xs"><?php echo $this->Paginator->sort('Hostcheck.perfdata', __('Perfdata')); ?></div>
		<?php foreach($hostchecks as $hostcheck): ?>
			<div class="col-xs-12 no-padding">
				<?php $borderClass = $this->Status->hostBorder($hostcheck['Hostcheck']['state']); ?>
				<div class="col-xs-12 col-md-2 <?php echo $borderClass; ?> <?php echo $borderClass;?>_first">
					<?php echo $this->Time->format($hostcheck['Hostcheck']['start_time'], '%H:%M %d.%m.%Y');?>
				</div>
				<div class="col-xs-12 col-md-2 <?php echo $borderClass; ?>">
					<?php echo h($hostcheck['Hostcheck']['current_check_attempt']); ?> / <?php echo h($hostcheck['Hostcheck']['max_check_attempts']); ?>
				</div>
				<div class="col-xs-12 col-md-1 <?php echo $borderClass; ?>">
					<?php
					if($hostcheck['Hostcheck']['state_type'] == 0):
						echo __('Soft');
					else:
						echo __('Hard');
					endif;
					?>
				</div>
				<div class=" col-xs-12 col-md-3 <?php echo $borderClass; ?>">
					<?php echo h($hostcheck['Hostcheck']['output']); ?>
				</div>
				<div class=" col-xs-12 col-md-4 <?php echo $borderClass; ?>">
					<?php if(strlen($hostcheck['Hostcheck']['perfdata']) == 0):?>
						&nbsp;
					<?php else: ?>
						<?php echo h($hostcheck['Hostcheck']['perfdata']); ?>
					<?php endif;?>
				</div>
				<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
					&nbsp;
				</div>
			</div>
		<?php endforeach; ?>

		<?php if(empty($hostchecks)):?>
			<div class="col-xs-12 text-center text-danger">
				<em>
					<?php echo __('No host checks found for this host'); ?>
				</em>
			</div>
		<?php endif;?>

		<?php echo $this->element('paginator'); ?>

	</div>
</div>
