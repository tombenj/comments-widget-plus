"use strict";

const { series, watch, src, dest, parallel } = require("gulp");

// Gulp plugins & utilities
const del = require("del");
const zip = require("gulp-zip");
const wpPot = require("gulp-wp-pot");

/**
 * Copy files for production
 */
function copyFiles() {
	return src([
		"**",
		"!*.map",
		"!node_modules/**",
		"!dist/**",
		"!sass/**",
		"!.git/**",
		"!.github/**",
		"!gulpfile.js",
		"!package.json",
		"!package-lock.json",
		"!.editorconfig",
		"!.gitignore",
		"!.jshintrc",
		"!.DS_Store",
		"!*.map",
	]).pipe(dest("dist/comments-widget-plus/"));
}

/**
 * Clean folder
 */
function clean() {
	return del(["dist/**", "dist"], { force: false });
}

/**
 * Zip folder
 */
function zipped() {
	return src(["dist/**"])
		.pipe(zip("comments-widget-plus.zip"))
		.pipe(dest("dist/"));
}

/**
 * Generate .pot file
 */
function language() {
	return src(["**/*.php", "!dist/**/*"])
		.pipe(
			wpPot({
				domain: "comments-widget-plus",
				package: "Comments Widget Plus",
			})
		)
		.pipe(dest("languages/comments-widget-plus.pot"));
}

/**
 * Tasks
 */
exports.build = series(language, copyFiles, zipped);
exports.clean = clean;
