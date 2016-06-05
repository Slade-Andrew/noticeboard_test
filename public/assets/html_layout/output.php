<?php
	class Output
	{
		var	$indent=0;
		var $lines=0;
		var $context=array();
		
		var $rooturl;
		var $template;
		var $content;
		var $request;
		
		function output_array($elements)
		/*
			Output each element in $elements on a separate line, with automatic HTML indenting.
			This should be passed markup which uses the <tag/> form for unpaired tags, to help keep
			track of indenting, although its actual output converts these to <tag> for W3C validation
		*/
		{
			foreach ($elements as $element) {
				$delta=substr_count($element, '<')-substr_count($element, '<!')-2*substr_count($element, '</')-substr_count($element, '/>');
				
				if ($delta<0)
					$this->indent+=$delta;
				
				echo str_repeat("\t", max(0, $this->indent)).str_replace('/>', '>', $element)."\n";
				
				if ($delta>0)
					$this->indent+=$delta;
					
				$this->lines++;
			}
		}

		function output() // other parameters picked up via func_get_args()
		/*
			Output each passed parameter on a separate line - see output_array() comments
		*/
		{
			$args=func_get_args();
			$this->output_array($args);
		}

		function output_raw($html)
		/*
			Output $html at the current indent level, but don't change indent level based on the markup within.
			Useful for user-entered HTML which is unlikely to follow the rules we need to track indenting
		*/
		{
			if (strlen($html))
				echo str_repeat("\t", max(0, $this->indent)).$html."\n";
		}

		function output_split($parts, $class, $outertag='SPAN', $innertag='SPAN', $extraclass=null)
		/*
			Output the three elements ['prefix'], ['data'] and ['suffix'] of $parts (if they're defined),
			with appropriate CSS classes based on $class, using $outertag and $innertag in the markup.
		*/
		{
			if (empty($parts) && ($outertag!='TD'))
				return;
				
			$this->output(
				'<'.$outertag.' CLASS="'.$class.(isset($extraclass) ? (' '.$extraclass) : '').'">',
				(strlen(@$parts['prefix']) ? ('<'.$innertag.' CLASS="'.$class.'-pad">'.$parts['prefix'].'</'.$innertag.'>') : '').
				(strlen(@$parts['data']) ? ('<'.$innertag.' CLASS="'.$class.'-data">'.$parts['data'].'</'.$innertag.'>') : '').
				(strlen(@$parts['suffix']) ? ('<'.$innertag.' CLASS="'.$class.'-pad">'.$parts['suffix'].'</'.$innertag.'>') : ''),
				'</'.$outertag.'>'
			);
		}
	}
?>