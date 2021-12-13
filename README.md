## Tools library
## Install
`composer require alfa-dev-team/tools`
## Usage
### DataTable
To use you need to add a trait `use HasDataTableBuilder` in your model.
### Filter
Firstly you need to create filter class that extends abstract class `Filter` 
To use add a trait `use HasFilter` in your model.
In query use method `filter(new ExampleFilter())`