var WOVODAT = function() {
	var modules = [],
		Observer = function() {
			var events = [];
			return {
				notify: function(event, args) {
					var i, j;
					for (i = 0; i < events.length; i += 1) {
						if (events[i].name === event) {
							for (j = 0; j < events[i].callbacks.length; j += 1) {
								events[i].callbacks[j](args);
							}
						}
					}
				},
				register: function(event, callback) {
					var i,
						found = false;
					for (i = 0; i < events.length; i += 1) {
						if (events[i].name === event) {
							events[i].callbacks.push(callback);
							found = true;
						}
					}
					if (found === false) {
						events.push({
							name: event,
							callbacks: [callback]
						});
					}
				}
			};
		}(),
		Sandbox = function() {			
		},
		findModuleByName = function(needed_name) {
			var i;
			for (i = 0; i < modules.length; i += 1)
				if (modules[i].name === needed_name)
					return modules[i];
			return null;
		},
		createAndStartModuleInstance = function(module) {
			var i, dependency_name, dependency;
			if (module.instance)
				return module.instance;
			// Prepare sandbox
			module.sandbox = new Sandbox();
			module.sandbox.observer = Observer;
			module.sandbox.modules = [];
			for (i = 0; i < module.dependencies.length; i += 1) {
				dependency_name = module.dependencies[i];
				dependency = findModuleByName(dependency_name);
				if (dependency) {
					createAndStartModuleInstance(dependency);
					module.sandbox.modules[dependency_name] = dependency.instance;
				}				
			}
			// Instantiate new module
			module.instance = new module.fn(module.sandbox);
			// Start the module
			module.instance.init();
		}

	return {
		registerModule: function(module_name, dependencies, fn) {
			modules.push({
				name: module_name,
				dependencies: dependencies,
				fn: fn
			})
		},
		startAllModules: function() {
			var i;
			for (i = 0; i < modules.length; i += 1) {
				createAndStartModuleInstance(modules[i]);
			}
		},
		// TODO(Tue): The observer instance should be hidden.
		observer: Observer
	};
}();