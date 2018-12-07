""" Test du backlog """

import unittest
from webDriversOptions import chrome_webdriver
from webDriversOptions import wait_url
from webDriversOptions import browser_register
from webDriversOptions import browser_login
from webDriversOptions import browser_logout
from webDriversOptions import browser_create_project
from webDriversOptions import browser_delete_project
from consts import File
from consts import Xpath

class BacklogProject(unittest.TestCase):
    """ Classe de test unitaire pour le backlog """
    __PROJECT_NAME = "projet"
    __TEST_PROJECT_ENTRY = "//a[@id='backlog-projet']"

    def setUp(self):
        self.chrome = chrome_webdriver()

    def test_backlog(self):
        """
        Test l'acces au backlog
        """
        self.assertIn(File.HOME_PAGE, self.chrome.current_url)

        browser_register(self.chrome)
        browser_login(self.chrome)
        browser_create_project(self.chrome, self.__PROJECT_NAME)

        self.assertIn(File.PROJECT_LIST, self.chrome.current_url)
        list_href = self.chrome.find_element_by_xpath(self.__TEST_PROJECT_ENTRY)
        list_href.click()
        self.assertIn(File.BACKLOG, self.chrome.current_url)

        self.chrome.find_element_by_xpath(Xpath.HOME_BTN).click()
        wait_url(self.chrome, File.HOME_PAGE)
        self.chrome.find_element_by_xpath(Xpath.LIST_PROJECTS_BTN).click()
        wait_url(self.chrome, File.PROJECT_LIST)
        browser_delete_project(self.chrome, self.__PROJECT_NAME)
        browser_logout(self.chrome)

    def tearDown(self):
        self.chrome.quit()

if __name__ == "__main__":
    unittest.main()
