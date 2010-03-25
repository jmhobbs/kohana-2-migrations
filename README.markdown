# About

This Kohana module provides simple migrations from the command line for SQL compliant databases.

# Using

Create a folder named "migrations" in your application folder.

Put valid SQL files in that folder, following the naming patterns: 001_ANYTHING_HERE_UP.sql & 001_ANYTHING_HERE_DOWN.sql

For example:

	001_Auth_DOWN.sql
	001_Auth_UP.sql
	002_Users_DOWN.sql
	002_Users_UP.sql
	003_Island_DOWN.sql
	003_Island_UP.sql
	004_Pages_DOWN.sql
	004_Pages_UP.sql

Then you can run them from the command line:

## Status

	jmhobbs@katya:~/Desktop/kohana$ php5 index.php migrations

	=======================[ Kohana Migrations ]=======================

							Action: Status

		Current Migration: 4
		Latest Migration: 4

	===================================================================

## Up

	jmhobbs@katya:~/Desktop/qaargh$ php5 index.php migrations/up/3

	=======================[ Kohana Migrations ]=======================

								Action: Migrate

			Current Migration: 0
			Latest Migration: 4

		Requested Migration: 3
							Migrating: UP

	===================================================================

	Migrated: 001_Auth_UP.sql
	Migrated: 002_Users_UP.sql
	Migrated: 003_Island_UP.sql


## Down

	jmhobbs@katya:~/Desktop/qaargh$ php5 index.php migrations/down/0

	=======================[ Kohana Migrations ]=======================

								Action: Migrate

			Current Migration: 4
			Latest Migration: 4

		Requested Migration: 0
							Migrating: DOWN

	===================================================================

	Migrated: 004_Pages_DOWN.sql
	Migrated: 003_Island_DOWN.sql
	Migrated: 002_Users_DOWN.sql
	Migrated: 001_Auth_DOWN.sql

# License

	Copyright (c) 2010 John Hobbs

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.

# Inspiration

Inspiration and base code from https://code.google.com/p/kohana-migrations/