# Monica Fork

![构建状态](https://github.com/naiba/monica/workflows/docker/badge.svg) <a href="README_en-US.md">
    <img height="20px" src="https://img.shields.io/badge/EN-flag.svg?color=555555&style=flat&logo=data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNjAgMzAiIGhlaWdodD0iNjAwIj4NCjxkZWZzPg0KPGNsaXBQYXRoIGlkPSJ0Ij4NCjxwYXRoIGQ9Im0zMCwxNWgzMHYxNXp2MTVoLTMwemgtMzB2LTE1enYtMTVoMzB6Ii8+DQo8L2NsaXBQYXRoPg0KPC9kZWZzPg0KPHBhdGggZmlsbD0iIzAwMjQ3ZCIgZD0ibTAsMHYzMGg2MHYtMzB6Ii8+DQo8cGF0aCBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iNiIgZD0ibTAsMGw2MCwzMG0wLTMwbC02MCwzMCIvPg0KPHBhdGggc3Ryb2tlPSIjY2YxNDJiIiBzdHJva2Utd2lkdGg9IjQiIGQ9Im0wLDBsNjAsMzBtMC0zMGwtNjAsMzAiIGNsaXAtcGF0aD0idXJsKCN0KSIvPg0KPHBhdGggc3Ryb2tlPSIjZmZmIiBzdHJva2Utd2lkdGg9IjEwIiBkPSJtMzAsMHYzMG0tMzAtMTVoNjAiLz4NCjxwYXRoIHN0cm9rZT0iI2NmMTQyYiIgc3Ryb2tlLXdpZHRoPSI2IiBkPSJtMzAsMHYzMG0tMzAtMTVoNjAiLz4NCjwvc3ZnPg0K">
</a>

**随意添加您需要的功能，我们没有 CI，没有 style-lint，也没有付费用户需要顾忌**

本分叉与上游的区别：
1. 支持农历(阴历)日期的提醒（很重要，许多人过农历生日、纪念日）
2. 对 storage 的访问增加了权限验证（排除了穷举照片、文档的风险）

## 首页截图

![首页截图](docs/home.jpg)

## 联系人截图

![联系人截图](docs/people.jpg)

**\#** Do you want to add more calendars (Buddhist, Islamic, Japanese)?
1. Add a translation in `resource/lang/en/people.php`, search for `reminders_calendar_lunar`. For example: add `reminders_calendar_buddhist` after `reminders_calendar_lunar`.
2. Realize the corresponding Gregorian date conversion operation in `convertToSolarCalendarDate` and `addTimeAccordingToFrequencyType` in `app/Helpers/DateHelper.php`.

此项目从 2020 年 12 月 fork 自 [Monica](https://github.com/monicahq/monica)
