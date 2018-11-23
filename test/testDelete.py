import unittest
from webDriversOptions import chromeWebdriver
from webDriversOptions import waitURL
from webDriversOptions import browserRegister
from webDriversOptions import browserLogin
from webDriversOptions import browserLogout
from webDriversOptions import browserCreateProject
from webDriversOptions import browserDeleteProject
from consts import File


class DeleteProject(unittest.TestCase):
    __PROJECT = "projet"

    def setUp(self):
        self.__chrome = chromeWebdriver()

    def testDelete(self):
        self.__chrome.get('http://php-apache:80')
        waitURL(self.__chrome, File.HOME_PAGE)
        self.assertIn(File.HOME_PAGE, self.__chrome.current_url)

        browserRegister(self.__chrome)
        browserLogin(self.__chrome)
        browserCreateProject(self.__chrome, self.__PROJECT)

        self.assertIn(File.PROJECT_LIST, self.__chrome.current_url)
        browserDeleteProject(self.__chrome, self.__PROJECT)
        browserLogout(self.__chrome)

    def tearDown(self):
        self.__chrome.quit()


if __name__ == "__main__":
    unittest.main()
