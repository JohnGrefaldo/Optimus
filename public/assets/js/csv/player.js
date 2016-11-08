var stepped = 0, chunks = 0, rows = 0;
var start, end;
var parser;
var pauseChecked = false;
var printStepChecked = false;

$(function()
{
	$('#submit-parse').click(function()
	{
		stepped = 0;
		chunks = 0;
		rows = 0;

		var files = $('#files')[0].files;
		var config = buildConfig();

		


		if (files.length > 0)
		{
			

			start = performance.now();
			
			$('#files').parse({
				config: config,
				before: function(file, inputElem)
				{
					console.log("Parsing file:", file);
				},
				complete: function()
				{
					console.log("Done with all files.");
				}
			});
		}
		
	});

	
	
});



function buildConfig()
{
	return {
		delimiter: "",
		newline: "",
		header: true,
		dynamicTyping: false,
		preview: 11,
		step: stepFn,
		encoding: "utf-8",
		worker: false,
		comments: true,
		complete: completeFn,
		error: errorFn,
		download: false,
		fastMode: true,
		skipEmptyLines:true,
		chunk: undefined,
		beforeFirstChunk: undefined
	};

	
}

function stepFn(results, parserHandle)
{
	stepped++;
	rows += results.data.length;

	parser = parserHandle;
	
	if (pauseChecked)
	{
		console.log(results, results.data[0]);
		parserHandle.pause();
		return;
	}
	
	if (printStepChecked)
		console.log(results, results.data[0]);
}



function errorFn(error, file)
{
	console.log("ERROR:", error, file);
}

function completeFn()
{
	end = performance.now();
	if (arguments[0]
			&& arguments[0].data)
		rows = arguments[0].data.length;
	
	console.log("Finished input (async). Time:", end-start, arguments);
	console.log("Rows:", rows, "Stepped:", stepped, "Chunks:", chunks);
}